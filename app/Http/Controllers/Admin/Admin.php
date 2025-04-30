<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Mail\SendMailreset;

use App\Models\City;
use App\Models\Country;

use App\Models\File;


use App\Models\Folder;


use App\Models\Notification;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;

use App\Traits\SendNotification;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;



class Admin extends Controller
{
    use SendNotification;
    public function admin()
    {
        return view('admin.admin');
    }



    public function notificationUrl($uuid)
    {
        $notification = Notification::whereUuid($uuid)->first();
        $notification->is_seen = 'yes';
        $notification->save();

        if (is_null($notification->target_url)) {
            return redirect(url()->previous());
        } else {
            return redirect($notification->target_url);
        }
    }

    public function markAllAsReadNotification(Request $request)
    {
        $userId = $request->input('user_id');
        $data = User::find($userId);



        Notification::where('user_id', $userId)->where('is_seen', 'no')->update(['is_seen' => 'yes']);


        return back();
    }
    public function getNotifications()
    {
        // Fetch notifications for the logged-in user
        $notifications = Notification::where('user_id', Session::get('LoggedIn'))
            ->orderBy('created_at', 'desc')
            ->take(5) // Limit to latest 5 notifications (adjust this based on your requirement)
            ->get();

        // Assuming you want to return a structure that includes text, target_url, and created_at
        $notifications = $notifications->map(function ($notification) {
            return [
                'text' => $notification->text,
                'target_url' => $notification->target_url,
                'created_at' => $notification->created_at->toIso8601String(), // Ensure it's in a format JS can work with
            ];
        });

        return response()->json(['notifications' => $notifications]);
    }


    public function login(Request $request)
    {
        $user = new user();
        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $data = user::where('email', $request->email)->first();
        // print_r($data->password);

        // die;
        if ($data) {
            if (FacadesHash::check($request->password, $data->password)) {

                $session = $request->session()->all();
                $data->update(['is_online' => 1, 'last_seen' => Carbon::now()]);
                session()->put('LoggedIn', $data->id);
                session()->put('LoggedInTimestamp', now());

                $request->session()->put('user_session', $data);
                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'Email is not register');
        }
    }
    public function getMessages()
    {
        // Fetch messages where receiver_id is the logged-in user (assuming user authentication)
        $messages = DB::table('chats')
            ->join('users', 'chats.sender_id', '=', 'users.id') // Join with users table to get sender's details
            ->where('receiver_id', Session::get('LoggedIn')) // Fetch messages for the logged-in user
            ->whereNull('chats.deleted_at')  // Exclude deleted messages
            ->orderBy('chats.created_at', 'desc') // Order by most recent
            ->limit(3) // Limit to 5 messages for the dropdown
            ->select('chats.*', 'users.name as sender_name', 'users.profile_photo') // Select necessary fields
            ->get();

        // Return messages with additional sender name and profile photo
        return response()->json(['messages' => $messages]);
    }



    public function dashboard(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('dashboards.default_dashboard', compact('user_session'));
        }
    }
    public function file_manager(Request $request)
    {
        if (Session::has('LoggedIn')) {
            // Retrieve the user session
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            // Eager load folders and their associated files to avoid N+1 problem
            $folders = Folder::with('files')->get();
            $files = File::limit(10)->latest()->get();

            // Optionally, filter files based on folder, or just fetch all files if needed
            // If you need files specific to a folder, you could do something like:
            // $files = File::where('folder_id', $folderId)->get();

            return view('file_manager', compact('user_session', 'folders', 'files'));
        }

        // Redirect or handle if the user is not logged in
        return redirect()->route('login');  // or any appropriate route
    }

    public function view($folderId)
    {
        // Fetch the folder and its files by ID
        $folder = Folder::with('files')->findOrFail($folderId);

        return view('folder.view', compact('folder'));
    }

    public function createFolder(Request $request)
    {
        $folderName = $request->input('name');

        if (empty($folderName)) {
            // Return error response if folder name is empty
            return response()->json(['error' => 'Folder name is required'], 400);
        }

        // Ensure the folder path is within the public storage directory
        $path = public_path('uploads/' . $folderName);

        try {
            // First, try to create the folder entry in the database
            Folder::create([
                'name' => $folderName,
                'path' => $path,
            ]);

            // Check if the folder exists or not
            if (!file_exists($path)) {
                // If the folder doesn't exist, create it
                mkdir($path, 0777, true);
                return response()->json(['success' => 'Folder created successfully']);
            } else {
                // If the folder already exists, return error
                return response()->json(['error' => 'Folder already exists'], 400);
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Folder creation failed: ' . $e->getMessage());

            // Return a server error response with the error message
            return response()->json(['error' => 'An error occurred while creating the folder. Please try again later.'], 500);
        }
    }

    public function upload(Request $request, $folderId)
    {
        // Debugging step, remove this after testing

        // Validate the file
        $request->validate([
            'file' => 'required|file|max:51200',
        ]);

        // Fetch the folder
        $folder = Folder::findOrFail($folderId);

        // Ensure the folder exists before storing the file
        $folderPath = public_path('uploads/' . $folder->name);
        if (!file_exists($folder->path)) {
            return response()->json(['error' => 'Folder does not exist'], 404);
        }

        // Store the file in the folder
        $file = $request->file('file');
        $path = $file->move($folder->path, $file->getClientOriginalName());
        // dd($file->getSize());
        // Optionally, create a file record in the database
        File::create([
            'folder_id' => $folder->id,
            'name' => $file->getClientOriginalName(),
            // 'size' => $file->getSize(),
            'extension' => $file->getClientOriginalExtension(),
            'path' => $path,
        ]);

        return response()->json(['success' => 'File uploaded successfully']);
    }




    public function updateMode(Request $request)
    {


        // Get the logged-in user
        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        // If no user is found, return an error response
        if (!$user_session) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Update the mode in the user's session record
        $user_session->mode = $request->mode;
        $user_session->save();

        // Return success response
        return response()->json(['success' => true, 'message' => 'Mode updated successfully']);
    }

    public function getUserMode()
    {
        // Get the logged-in user
        $user_session = User::where('id', Session::get('LoggedIn'))->first();

        // If no user is found, return an error response or default 'light'
        if (!$user_session) {
            return response()->json(['mode' => 'light'], 200); // Or you can return an error response
        }

        // Return the user's mode, or default to 'light' if not set
        return response()->json(['mode' => $user_session->mode ?? 'light'], 200);
    }



    public function flag_icon(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.flag_icon', compact('user_session'));
        }
    }
    public function font_awesome(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.font_awesome', compact('user_session'));
        }
    }
    public function ico_icon(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.ico_icon', compact('user_session'));
        }
    }
    public function themify_icon(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.themify_icon', compact('user_session'));
        }
    }
    public function feather_icon(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.feather_icon', compact('user_session'));
        }
    }
    public function whether_icon(Request $request)
    {
        if (Session::has('LoggedIn')) {



            $user_session = User::where('id', Session::get('LoggedIn'))->first();



            return view('icons.whether_icon', compact('user_session'));
        }
    }



    public function users(Request $request)
    {
        if (Session::has('LoggedIn')) {
            $usersData = DB::table("users")->where('is_super_admin', '0')->get();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin/users', compact('user_session', 'usersData'));
        }
    }

    public function edit_user(Request $request, $id)
    {
        if (Session::has('LoggedIn')) {
            $userData = DB::table("users")->where('id', $id)->where('is_super_admin', '0')->first();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();
            $countries = Country::all();
            $cities = City::all();
            return view('admin/edit_user', compact('user_session', 'userData', 'countries', 'cities'));
        }
    }

    public function change_password(Request $request)
    {

        $data = array();
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.change_password', compact('user_session'));
    }

    public function update_password(Request $request)
    {


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password']
        ]);


        $data = User::find(Session::get('LoggedIn'));
        // $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        if (!FacadesHash::check($request->old_password, $data->password)) {
            return back()->with("fail", "Old Password Doesn't match!");
        }
        if (FacadesHash::check($request->new_password, $data->password)) {
            return back()->with("fail", "Please enter a password which is not similar then current password!!");
        }
        #Update the new Password
        $data = User::where('id', '=', $data->id)->update([
            'password' => FacadesHash::make($request->new_password)

        ]);
        return redirect('admin/dashboard')->with('success', 'Successfully Updated');
    }



    public function profile(Request $request)
    {
        $data = array();
        if (Session::has('LoggedIn')) {
            $data = User::where('id', '=', Session::get('LoggedIn'))->first();
        }

        return view('admin.profile', compact('data'));
    }

    public function logout(Request $request)
    {
        if (Session::has('LoggedIn')) {

            $check = User::where('id', Session::get('LoggedIn'))->first();
            if ($check->is_super_admin == 0) {
                Session::forget('LoggedIn');
                Session::forget('user_session');
                $request->session()->invalidate();
                return redirect('/');
            }
            Session::forget('LoggedIn');
            Session::forget('user_session');
            $request->session()->invalidate();
            return redirect('admin/login');
        }
    }
    public function add_user()
    {
        if (Session::has('LoggedIn')) {

            $countries = Country::all();
            $cities = City::all();
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.add_user', compact('user_session', 'countries', 'cities'));
        }
    }

    public function save_user(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'max:30'],
            'confirm_password' => 'required|same:password', // Ensure password confirmation matches
            'mobile_number' => 'required|string|max:15', // Adjusted to match the expected format
            'code' => 'required', // Validation for ID number
            'status' => 'required|boolean', // Ensure status is provided
        ]);

        try {
            // Mobile number handling
            $mobileNumber = $request->mobile_number; // Updated to match your form field
            $prefixedMobileNumber = "591" . $mobileNumber;

            // Create a new user instance
            $user = User::create([
                'account_type' => 'user',
                'name' => trim($request->first_name . ' ' . $request->last_name), // Combine first and last name
                'email' => $request->email,
                'password' => bcrypt($request->password), // Ensure the password is hashed
                'custom_password' => $request->password,
                'mobile_number' => $prefixedMobileNumber,
                'id_number' => $request->code, // New field from the form

                'status' => $request->status, // Active status
            ]);

            // Send email verification notification
            // $user->notify(new VerifyEmailNotification($user));

            // Fire the UserRegistered event (if needed)
            // event(new UserRegistered($user));

            // Notification for registration
            // $text = 'A new user has registered on the platform.';
            // $target_url = route('users');
            // $this->sendForApi($text, 1, $target_url, $user->id, $user->id);

            return back()->with('success', 'User is created');
        } catch (\Exception $e) {
            // Log the error for debugging purposes (optional)
            \Log::error('Error creating user: ' . $e->getMessage());
            return back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }


    public function delete_user($id)
{
    $user = User::find($id); // Use find() instead of where()->first() for simplicity

    if ($user) {
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Usuario eliminado con éxito']);
    } else {
        return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
    }
}



    public function edit_profile()
    {
        if (Session::has('LoggedIn')) {
            $user_session = User::where('id', Session::get('LoggedIn'))->first();

            return view('admin.edit_profile', compact('user_session'));
        }
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required',

        ]);

        if (!empty($request->profile_photo)) {

            $image = $request->file('profile_photo')->getClientOriginalName();
            $final =  $request->profile_photo->move(public_path('profile_photo'), $image);
            $profile = $_FILES['profile_photo']['name'];
        }
        $check = User::find($request->user_id);

        if (empty($request->profile_photo)) {

            $profile = $check->profile_photo;
        }
        $data = User::find(Session::get('LoggedIn'));
        $data = User::where('id', '=', $request->user_id)->update([
            'name' => ($request->name),

            'email' => ($request->email),
            'profile_photo' => $profile,

        ]);
        if ($data) {
            return redirect('admin/dashboard')->with('success', 'Profile Updted Successfully');
        } else {
            return back()->with('fail', 'Failed');
        }
    }

    public function update_user(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'first_name' => 'required|string|max:255',
                'mobile_number' => 'required|string|max:15',
                'email' => 'required|email|max:255',

                'code' => 'nullable|string|max:20',

                'status' => 'required|boolean',
            ]);

            $user = User::findOrFail($request->user_id);

            $user->name = trim($request->first_name);
            $user->mobile_number = "591" . $request->mobile_number;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); // Ensure the password is hashed
            $user->custom_password = $request->password;
            $user->id_number = $request->code;
            $user->status = $request->status;

            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                $imageName = time() . '_' . $profilePhoto->getClientOriginalName();
                $profilePhoto->move(public_path('profile_photo'), $imageName);

                if ($user->profile_photo && file_exists(public_path('profile_photo/' . $user->profile_photo))) {
                    unlink(public_path('profile_photo/' . $user->profile_photo));
                }
                $user->profile_photo = $imageName;
            }

            if ($user->save()) {
                return redirect('admin/users')->with('success', 'Usuario actualizado con éxito');
            } else {
                return redirect()->back()->with('fail', 'Error al actualizar el perfil');
            }
        } catch (\Exception $e) {
            \Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()->with('fail', 'Error: ' . $e->getMessage());
        }
    }


    public function forget_password()
    {

        return view('admin.forget_password');
    }
    public function unlock()
    {

        return view('others.authentication.unlock');
    }
    public function unlocked(Request $request)
    {
        // Validate the password input
        $request->validate([
            'password' => 'required',
        ]);

        // Retrieve the user using query builder
        $user = DB::table('users')->where('custom_password', $request->password)->first();

        // Check if the user exists
        if ($user) {
            // Check the password against the stored hashed password
            if (FacadesHash::check($request->password, $user->password)) {
                // Manually update user status to online and last seen time
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'is_online' => 1,
                        'last_seen' => Carbon::now(),
                    ]);

                // Store the user id in the session as "LoggedIn"
                session()->put('LoggedIn', $user->id);
                session()->put('LoggedInTimestamp', now());
                $request->session()->put('user_session', $user);
                // Redirect to the dashboard
                return redirect('admin/dashboard');
            } else {
                // Password is incorrect, show failure message
                return back()->with('fail', 'Password does not match.');
            }
        }

        // User not found, show failure message
        return back()->with('fail', 'User not found.');
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            User::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}

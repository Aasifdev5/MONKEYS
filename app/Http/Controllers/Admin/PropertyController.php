<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    // Utility method to handle all image uploads to specific folders
    public function uploadToFolder($file, $folder)
    {
        $fileName = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads/' . $folder);
        $file->move($destinationPath, $fileName);
        return 'uploads/' . $folder . '/' . $fileName;
    }

    public function index()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        $properties = Property::latest()->get();
        return view('admin.properties.index', compact('properties', 'user_session'));
    }

    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        return view('admin.properties.create', compact('user_session'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'hourly_price' => 'nullable|numeric|min:0',
        'price' => 'required|array|min:1',
        'price.*.amount' => 'required|numeric|min:0',
        'price.*.hours' => 'required|integer|min:1',
        'max_people' => 'required|integer|min:1',
        'equipment_rate' => 'required|numeric|min:0|max:5',
        'bedrooms' => 'nullable|array',
        'bedrooms.*.title' => 'required_with:bedrooms|string|max:255',
        'bedrooms.*.description' => 'required_with:bedrooms|string',
        'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'amenities' => 'nullable|array',
        'amenities.*' => 'in:entertainment,group_spaces,fully_equipped,bed,tv,wifi,private_bathroom,fridge,ac,kitchen,microwave,chairs,tables,hot_shower,pool,jacuzzi,bar,remotes,playstation,alexa,living,sound_room,heating,hammocks,wardrobe,sound_system',
        'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
    ]);

    // Upload thumbnail
    $thumbnailPath = $this->uploadToFolder($request->file('thumbnail'), 'property_thumbnails');

    // Prepare bedrooms array
    $bedrooms = [];
    if ($request->has('bedrooms')) {
        foreach ($request->bedrooms as $index => $bedroom) {
            $imagePath = null;
            if (isset($bedroom['image']) && $bedroom['image'] instanceof \Illuminate\Http\UploadedFile) {
                $imagePath = $this->uploadToFolder($bedroom['image'], 'bedrooms');
            }
            $bedrooms[] = [
                'title' => $bedroom['title'],
                'description' => $bedroom['description'],
                'image' => $imagePath,
            ];
        }
    }

    // Prepare amenities
    $amenities = $validated['amenities'] ?? [];

    // Upload gallery images
    $propertyImages = [];
    if ($request->hasFile('property_images')) {
        foreach ($request->file('property_images') as $image) {
            $propertyImages[] = $this->uploadToFolder($image, 'property_images');
        }
    }

    // Prepare price JSON
    $priceArray = array_values(array_filter($validated['price'], function ($item) {
        return isset($item['amount']) && isset($item['hours']);
    }));
    $encodedPrice = json_encode($priceArray);

    // Save property
    Property::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'thumbnail' => $thumbnailPath,
        'hourly_price' => $validated['hourly_price'] ?? null,
        'price' => $encodedPrice,
        'max_people' => $validated['max_people'],
        'rating' => $validated['equipment_rate'],
        'bedrooms' => json_encode($bedrooms),
        'amenities' => json_encode($amenities),
        'property_images' => json_encode($propertyImages),
    ]);

    return redirect()->route('properties.index')->with('success', 'Property created successfully.');
}


    public function edit(Property $property)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }
        $user_session = User::find(Session::get('LoggedIn'));
        return view('admin.properties.edit', compact('property', 'user_session'));
    }

  public function update(Request $request, Property $property)
{
    // Check if user is logged in
    if (!Session::has('LoggedIn')) {
        return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
    }

    // Verify user session
    $user_session = User::find(Session::get('LoggedIn'));
    if (!$user_session) {
        return redirect()->back()->with('fail', 'Sesión inválida');
    }

    // Validate request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'hourly_price' => 'nullable|numeric|min:0',
        'price' => 'required|array|min:1',
        'price.*.amount' => 'required|numeric|min:0',
        'price.*.hours' => 'required|integer|min:1',
        'max_people' => 'required|integer|min:1',
        'equipment_rate' => 'required|numeric|min:0|max:5',
        'bedrooms' => 'nullable|array',
        'bedrooms.*.title' => 'required_with:bedrooms|string|max:255',
        'bedrooms.*.description' => 'required_with:bedrooms|string',
        'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        'amenities' => 'nullable|array',
        'amenities.*' => 'in:entertainment,group_spaces,fully_equipped,bed,tv,wifi,private_bathroom,fridge,ac,kitchen,microwave,chairs,tables,hot_shower,pool,jacuzzi,bar,remotes,playstation,alexa,living,sound_room,heating,hammocks,wardrobe,sound_system',
        'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
    ]);

    // Handle thumbnail upload
    $thumbnailPath = $property->thumbnail;
    if ($request->hasFile('thumbnail')) {
        // Delete old thumbnail if it exists
        if ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) {
            Storage::disk('public')->delete($thumbnailPath);
        }
        $thumbnailPath = $this->uploadToFolder($request->file('thumbnail'), 'property_thumbnails');
    }

    // Prepare bedrooms array
    $bedrooms = [];
    if ($request->has('bedrooms')) {
        $existingBedrooms = is_string($property->bedrooms) ? json_decode($property->bedrooms, true) : ($property->bedrooms ?? []);
        foreach ($request->bedrooms as $index => $bedroom) {
            $imagePath = null;
            if (isset($bedroom['image']) && $bedroom['image'] instanceof \Illuminate\Http\UploadedFile) {
                // New image uploaded
                $imagePath = $this->uploadToFolder($bedroom['image'], 'bedrooms');
            } elseif (isset($existingBedrooms[$index]['image']) && is_string($existingBedrooms[$index]['image'])) {
                // Keep existing image
                $imagePath = $existingBedrooms[$index]['image'];
            }
            $bedrooms[] = [
                'title' => $bedroom['title'],
                'description' => $bedroom['description'],
                'image' => $imagePath,
            ];
        }
    }

    // Prepare amenities
    $amenities = $validated['amenities'] ?? [];

    // Handle gallery images
    $propertyImages = is_string($property->property_images) ? json_decode($property->property_images, true) : ($property->property_images ?? []);
    $propertyImages = is_array($propertyImages) ? $propertyImages : [];
    if ($request->hasFile('property_images')) {
        foreach ($request->file('property_images') as $image) {
            $propertyImages[] = $this->uploadToFolder($image, 'property_images');
        }
    }

    // Prepare price JSON
    $priceArray = array_values(array_filter($validated['price'], function ($item) {
        return isset($item['amount']) && isset($item['hours']);
    }));
    $encodedPrice = json_encode($priceArray);

    // Update property
    $property->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'thumbnail' => $thumbnailPath,
        'hourly_price' => $validated['hourly_price'] ?? null,
        'price' => $encodedPrice,
        'max_people' => $validated['max_people'],
        'rating' => $validated['equipment_rate'],
        'bedrooms' => json_encode($bedrooms),
        'amenities' => json_encode($amenities),
        'property_images' => json_encode($propertyImages),
    ]);

    return redirect()->route('properties.index')->with('success', 'Propiedad actualizada con éxito.');
}



    public function destroy($id)
    {
        \Log::info("Destroy method called for property ID: {$id}");

        $property = Property::find($id);

        if (!$property) {
            \Log::warning("Property with ID {$id} not found.");
            return response()->json(['error' => 'Property not found.'], 404);
        }

        // Delete thumbnail if it exists
        if (!empty($property->thumbnail)) {
            $thumbnailPath = public_path($property->thumbnail);
            if (file_exists($thumbnailPath)) {
                @unlink($thumbnailPath);
            }
        }

        // Delete property images (array from cast)
        if (!empty($property->property_images) && is_array($property->property_images)) {
            foreach ($property->property_images as $image) {
                $imagePath = public_path($image);
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
            }
        }

        $property->delete();

        return response()->json(['success' => 'Property deleted successfully.']);
    }




    public function updateFavorite(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->favorite = $request->input('favorite');
        $property->save();

        return response()->json(['success' => true]);
    }
    public function bulkDelete(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }

        $ids = $request->ids;
        $properties = Property::whereIn('id', $ids)->get();

        foreach ($properties as $property) {
            if ($property->thumbnail && file_exists(public_path($property->thumbnail))) {
                unlink(public_path($property->thumbnail));
            }

            if ($property->property_images) {
                foreach ($property->property_images as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }

            $property->delete();
        }

        return response()->json(['success' => 'Selected properties deleted successfully.']);
    }
}

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
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,avif',
        'price' => 'required|array',
        'price.*.amount' => 'required|numeric',
        'price.*.hours' => 'required|integer',
        'max_people' => 'required|integer',
        'equipment_rate' => 'required',
        'bedrooms' => 'nullable|array',
        'bedrooms.*.title' => 'required_with:bedrooms|string',
        'bedrooms.*.description' => 'required_with:bedrooms|string',
        'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
        'amenities' => 'nullable|array',
        'amenities.*' => 'in:entertainment,group_spaces,fully_equipped,bed,tv,wifi,private_bathroom,fridge,ac,kitchen,microwave,chairs,tables,hot_shower,pool,jacuzzi,bar,remotes,playstation,alexa,living,sound_room,heating,hammocks,wardrobe,sound_system',
        'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
    ]);

    $thumbnailPath = $this->uploadToFolder($request->file('thumbnail'), 'property_thumbnails');

    $bedrooms = [];
    if ($request->has('bedrooms')) {
        foreach ($request->bedrooms as $index => $bedroom) {
            $bedroomImagePath = isset($bedroom['image']) ? $this->uploadToFolder($bedroom['image'], 'bedrooms') : null;
            $bedrooms[] = [
                'title' => $bedroom['title'],
                'description' => $bedroom['description'],
                'image' => $bedroomImagePath,
            ];
        }
    }

    $amenities = $request->amenities ?? [];

    $propertyImages = [];
    if ($request->hasFile('property_images')) {
        foreach ($request->file('property_images') as $image) {
            $propertyImages[] = $this->uploadToFolder($image, 'property_images');
        }
    }

    // Convert price to JSON
    $prices = array_values(array_filter($validated['price'], function ($p) {
        return isset($p['amount'], $p['hours']);
    }));
    $encodedPrice = json_encode($prices);

    Property::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'thumbnail' => $thumbnailPath,
        'price' => $encodedPrice,
        'max_people' => $validated['max_people'],
        'rating' => $validated['equipment_rate'],
        'bedrooms' => $bedrooms,
        'amenities' => $amenities,
        'property_images' => $propertyImages,
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
    if (!Session::has('LoggedIn')) {
        return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
    }

    $user_session = User::find(Session::get('LoggedIn'));

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
        'price' => 'required|array',
        'price.*.amount' => 'required|numeric',
        'price.*.hours' => 'required|integer',
        'max_people' => 'required|integer',
        'equipment_rate' => 'required',
        'bedrooms' => 'nullable|array',
        'bedrooms.*.title' => 'required_with:bedrooms|string',
        'bedrooms.*.description' => 'required_with:bedrooms|string',
        'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
        'amenities' => 'nullable|array',
        'amenities.*' => 'in:entertainment,group_spaces,fully_equipped,bed,tv,wifi,private_bathroom,fridge,ac,kitchen,microwave,chairs,tables,hot_shower,pool,jacuzzi,bar,remotes,playstation,alexa,living,sound_room,heating,hammocks,wardrobe,sound_system',
        'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
        'existing_images' => 'nullable|array',
    ]);

    $thumbnailPath = $property->thumbnail;
    if ($request->hasFile('thumbnail')) {
        if ($property->thumbnail && file_exists(public_path($property->thumbnail))) {
            unlink(public_path($property->thumbnail));
        }
        $thumbnailPath = $this->uploadToFolder($request->file('thumbnail'), 'property_thumbnails');
    }

    $bedrooms = [];
    if ($request->has('bedrooms')) {
        foreach ($request->bedrooms as $index => $bedroom) {
            $bedroomImagePath = isset($bedroom['image']) ? $this->uploadToFolder($bedroom['image'], 'bedrooms') : ($property->bedrooms[$index]['image'] ?? null);
            $bedrooms[] = [
                'title' => $bedroom['title'],
                'description' => $bedroom['description'],
                'image' => $bedroomImagePath,
            ];
        }
    }

    $amenities = $request->amenities ?? [];

    $propertyImages = is_string($property->property_images)
        ? json_decode($property->property_images, true)
        : ($property->property_images ?? []);

    $existingImages = $request->input('existing_images', null);
    if ($existingImages !== null || $request->hasFile('property_images')) {
        if ($existingImages !== null) {
            $propertyImages = array_intersect($propertyImages, $existingImages);
        }

        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $propertyImages[] = $this->uploadToFolder($image, 'property_images');
            }
        }

        $propertyImages = array_values($propertyImages);
    }

    // Convert price to JSON
    $prices = array_values(array_filter($validated['price'], function ($p) {
        return isset($p['amount'], $p['hours']);
    }));
    $encodedPrice = json_encode($prices);

    $property->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'thumbnail' => $thumbnailPath,
        'price' => $encodedPrice,
        'max_people' => $validated['max_people'],
        'rating' => $validated['equipment_rate'],
        'bedrooms' => $bedrooms,
        'amenities' => $amenities,
        'property_images' => $propertyImages,
    ]);

    return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
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

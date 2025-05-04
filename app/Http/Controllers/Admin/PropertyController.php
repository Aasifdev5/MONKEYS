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
            'price' => 'required|numeric',
            'max_people' => 'required|integer',
            'bedrooms' => 'nullable|array',
            'bedrooms.*.title' => 'required_with:bedrooms|string',
            'bedrooms.*.description' => 'required_with:bedrooms|string',
            'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
            'amenities' => 'nullable|array',
            'amenities.*.title' => 'required_with:amenities|string',
            'amenities.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif',
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

        $amenities = [];
        if ($request->has('amenities')) {
            foreach ($request->amenities as $index => $amenity) {
                $amenityImagePath = isset($amenity['image']) ? $this->uploadToFolder($amenity['image'], 'amenities') : null;
                $amenities[] = [
                    'title' => $amenity['title'],
                    'image' => $amenityImagePath,
                ];
            }
        }

        $propertyImages = [];
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $propertyImages[] = $this->uploadToFolder($image, 'property_images');
            }
        }

        Property::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $thumbnailPath,
            'price' => $validated['price'],
            'max_people' => $validated['max_people'],
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
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
            'max_people' => 'required|integer',
            'bedrooms' => 'nullable|array',
            'bedrooms.*.title' => 'required_with:bedrooms|string',
            'bedrooms.*.description' => 'required_with:bedrooms|string',
            'bedrooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'amenities' => 'nullable|array',
            'amenities.*.title' => 'required_with:amenities|string',
            'amenities.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'property_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'existing_images' => 'nullable|array',
        ]);

        // Handle thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($property->thumbnail && file_exists(public_path($property->thumbnail))) {
                unlink(public_path($property->thumbnail));
            }
            $thumbnailPath = $this->uploadToFolder($request->file('thumbnail'), 'property_thumbnails');
        } else {
            $thumbnailPath = $property->thumbnail;
        }

        // Handle bedrooms
        $bedrooms = [];
        if ($request->has('bedrooms')) {
            foreach ($request->bedrooms as $index => $bedroom) {
                $bedroomImagePath = $property->bedrooms[$index]['image'] ?? null;
                if (isset($bedroom['image'])) {
                    $bedroomImagePath = $this->uploadToFolder($bedroom['image'], 'bedrooms');
                }
                $bedrooms[] = [
                    'title' => $bedroom['title'],
                    'description' => $bedroom['description'],
                    'image' => $bedroomImagePath,
                ];
            }
        }

        // Handle amenities
        $amenities = [];
        if ($request->has('amenities')) {
            foreach ($request->amenities as $index => $amenity) {
                $amenityImagePath = $property->amenities[$index]['image'] ?? null;
                if (isset($amenity['image'])) {
                    $amenityImagePath = $this->uploadToFolder($amenity['image'], 'amenities');
                }
                $amenities[] = [
                    'title' => $amenity['title'],
                    'image' => $amenityImagePath,
                ];
            }
        }

        // Handle property images
        $propertyImages = is_string($property->property_images)
            ? json_decode($property->property_images, true)
            : ($property->property_images ?? []);

        // Only update property_images if there are changes
        $existingImages = $request->input('existing_images', null);

        if ($existingImages !== null || $request->hasFile('property_images')) {
            // If existing_images is provided, filter the property_images to retain only those
            if ($existingImages !== null) {
                $propertyImages = array_intersect($propertyImages, $existingImages);
            }

            // Append new images if uploaded
            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $propertyImages[] = $this->uploadToFolder($image, 'property_images');
                }
            }

            $propertyImages = array_values($propertyImages); // Reindex the array
        }

        // Update the property
        $property->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $thumbnailPath,
            'price' => $validated['price'],
            'max_people' => $validated['max_people'],
            'bedrooms' => $bedrooms,
            'amenities' => $amenities,
            'property_images' => $propertyImages,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }


    public function destroy(Property $property)
    {
        if (!Session::has('LoggedIn')) {
            return redirect()->back()->with('fail', 'Tienes que iniciar sesión primero');
        }

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

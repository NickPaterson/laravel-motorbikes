<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorbikeUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Motorbike;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

use Spatie\Dropbox\Client;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

use Illuminate\Validation\Rule;

class MotorbikeController extends Controller
{
    // show all motorbikes
    public function index() : View
    {
        return view('pages/listings', [
            'motorbikes' => Motorbike::latest()->filter(request(['search']))->get(),
        ]);
    }

    // show a single motorbike
    public function show($slug) : View
    {
        $motorbike = Motorbike::where('slug', $slug)->firstOrFail();
        $images = json_decode($motorbike->images);

        //$imagefile = Storage::url($images[0]->path);
        // dd($imagefile);
        return view('pages/motorbike', [
            'motorbike' => $motorbike,
            'images' => $images,
            //'imagefile' => $imagefile,
        ]);
    }

    // create a motorbike
    public function create(Request $request) : View
    {
        $categoryController = new CategoryController();
        $categories = $categoryController->findAll();

        $dvlaData = $request->session()->get('dvlaData');

        return view('motorbikes/create', [
            'categories' => $categories,
            'request' => $request,
            'dvlaData' => $dvlaData,
        ]);
    }

    // store a motorbike
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'category'      => 'required|integer',
            'summary'       => 'required|string|max:500',
            'description'   => 'required|string|max:5000',
            'make'          => 'required|string|max:100',
            'model'         => 'required|string|max:100',
            'engine'        => 'required|integer',
            'year'          => 'required|integer',
            'price'         => 'required|integer',
            'images'        => [
                'nullable',
                'array',
                'max:5',  
                'each' => [
                    'nullable',
                    'image',
                    'max:12288',  // 12 * 1024 
                ],
            ],
            'title' => [
                'required',
                'string',
                'max:255',
                // Title needs to only be unique to the user, as the user id is included when making the slug
                Rule::unique('motorbikes')->where(function ($query) use ($user) {
                    return $query->where('user_id', $user->id);
                }),
            ],
        ]);
        // Create a new Motorbike
        $motorbike = new Motorbike();

        // create slug from user id and title to make it unique to the user
        $slug = $user->id . "-" . str_replace(' ', '-', $request->title);
        $motorbike->slug = $slug;

        //images uses user id and slug to organise into folders
        $imagesPaths = [];

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $mime = $image->getMimeType();
                $originalName = $image->getClientOriginalName();
                
                // $path = $image->store('images/public' . $user->id . '/' . $slug);
                // $path = $image->store('images/' . $user->id . '/' . $slug);

                $path = $image->store('public/images/' . $user->id);

                $path = str_replace('public/', '', $path);
                //$path = 'images/' . $user->id . '/' . $slug;

                //dd($image, $path);
                array_push($imagesPaths, [
                    'path'=>$path,
                    'originalName'=>$originalName,
                    'mime'=>$mime
                ]);
                $motorbike->images = json_encode($imagesPaths);
                $motorbike->thumbnail_url = $imagesPaths[0]['path'];
            }
        } else 
        {
            $motorbike->thumbnail_url = 'images/No-Image-Placeholder.png';
        }
        
        $motorbike->user_id = $user->id;
        $motorbike->category_id = $request->category;
        $motorbike->title = $request->title;
        $motorbike->summary = $request->summary;
        $motorbike->description = $request->description;
        $motorbike->make = $request->make;
        $motorbike->model = $request->model;
        $motorbike->engine = $request->engine;
        $motorbike->year = $request->year;
        $motorbike->price = $request->price;
        
        // Save to the database
        $motorbike->save();

        return redirect()->route('dashboard');
    }

    // edit a motorbike
    //public function edit($slug): View
    public function edit(Motorbike $motorbike): View
    {
        //$motorbike = Motorbike::where('slug', $slug)->first();
        $categoryController = new CategoryController();
        $categories = $categoryController->findAll();
        $images = json_decode($motorbike->images);

        if ($images) {
            
            // dd($images);
            foreach ($images as $key => $image) {
                $images[$key]->url = Storage::url('public/' . $image->path); 
            }
        }
        
        return view('motorbikes/edit', [
            'motorbike' => $motorbike,
            'categories' => $categories,
            'images' => $images
        ]);
    }

    // update a motorbike
    public function update(Request $request, Motorbike $motorbike) 
    {
        $user = Auth::user();

        //if motorbike not found response with 404 error
        try {
            Motorbike::where('id', $motorbike->id) ? true : false;
        } catch  (ModelNotFoundException $e) {
            return abort(404);
        }
        
        $request->validate([
            'category'      => 'required|integer',
            'summary'       => 'required|string|max:500',
            'description'   => 'required|string|max:5000',
            'make'          => 'required|string|max:100',
            'model'         => 'required|string|max:100',
            'engine'        => 'required|integer',
            'year'          => 'required|integer',
            'price'         => 'required|integer',
            'images'        => [
                'nullable',
                'array',
                'max:5',  
                'each' => [
                    'nullable',
                    'image',
                    'max:12288',  // 12 * 1024 
                ],
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
        ]);
        
        // save the old slug 
        $slug = $motorbike->slug;
        $oldSlug = $motorbike->slug;
        // get current images
        $currentImages = json_decode($motorbike->images, true) ?? [];
         
        //dd($request->images);
        
        $motorbike->title = $request->title;

        // check if the title has changed
        if ($motorbike->isDirty('title')) {
            $slug = $user->id . "-" . str_replace(' ', '-', $request->title);
            if($oldSlug !== $slug) {
                // Move current images
                // No longer need to move the images as they no longer saved by their slug
                //Storage::move("public/images/{$user->id}/{$oldSlug}", "public/images/{$user->id}/{$slug}");
                if (!empty($currentImages)) {
                    foreach ($currentImages as $image) {
                        $image['path'] = 'images/' . $user->id ;
                    }
                }
            }
        }
        $motorbike->slug = $slug;

        // images uses user id and slug to organise into folders
        $imagesPaths = [];

        if ($request->hasFile('images') && $request->file('images') !== null) {
            foreach ($request->file('images') as $image) {
                $mime = $image->getMimeType();
                $originalName = $image->getClientOriginalName();
                
                // $path = $image->store('images/public' . $user->id . '/' . $slug);
                // $path = $image->store('images/' . $user->id . '/' . $slug);
                $path = $image->store('public/images/' . $user->id);

                $path = str_replace('public/', '', $path);

                array_push($imagesPaths, [
                    'path'=>$path,
                    'originalName'=>$originalName,
                    'mime'=>$mime
                ]);
            }  
            // merge current and new images arrays
            $imagesPaths = array_merge($currentImages, $imagesPaths);
            $motorbike->images = json_encode($imagesPaths);
            $motorbike->thumbnail_url = $imagesPaths[0]['path'];
         } 
         // should have already been done
        // else {
        //     $motorbike->thumbnail_url = 'images/No-Image-Placeholder.png';
        // }
        
        $motorbike->category_id = $request->category;
        $motorbike->summary = $request->summary;
        $motorbike->description = $request->description;
        $motorbike->make = $request->make;
        $motorbike->model = $request->model;
        $motorbike->engine = $request->engine;
        $motorbike->year = $request->year;
        $motorbike->price = $request->price;

        $motorbike->save();
        
        return to_route('dashboard');
    }

    // delete a motorbike
    public function destroy(Motorbike $motorbike) 
    {
        try {
            $motorbike = Motorbike::findOrFail($motorbike->id);
        } catch (ModelNotFoundExpection $e) {
            return abort(404);
        }
        
        // delete image paths
        $images = json_decode($motorbike->images, true);

        if (!empty($images)) {
            foreach ($images as $image) {
                //dd($image['path']);
                Storage::delete('public/'.$image['path']);
            }
        }

        // delete the motorbike
        $motorbike->delete();

        return to_route('dashboard');
    }
}



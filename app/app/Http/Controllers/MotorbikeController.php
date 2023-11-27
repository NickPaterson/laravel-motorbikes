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

class MotorbikeController extends Controller
{
    // show all motorbikes
    public function index(): View
    {
        return view('pages/listings', [
            'motorbikes' => Motorbike::all()
        ]);
    }

    // show a single motorbike
    public function show($slug): View
    {
        $motorbike = Motorbike::where('slug', $slug)->firstOrFail();
        $images = json_decode($motorbike->images);

        $imagefile = Storage::url($images[0]->path);
        // dd($imagefile);
        return view('pages/motorbike', [
            'motorbike' => $motorbike,
            'images' => $images,
            'imagefile' => $imagefile,
        ]);
    }

    // create a motorbike
    public function create(Request $request): View
    {
        $categoryController = new CategoryController();
        $categories = $categoryController->findAll();

        return view('motorbikes/create', [
            'categories' => $categories,
            'request' => $request,
        ]);
    }

    // store a motorbike
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'make' => 'required',
            'model' => 'required',
            'engine' => 'required',
            'year' => 'required',
            'price' => 'required',
        ]);

        $user = Auth::user();
        $motorbike = new Motorbike();


        // create slug from user id and title to make it unique to the user
        $slug = $user->id . "-" . str_replace(' ', '-', $request->title);
        $motorbike->slug = $slug;

        //images uses user id and slug to organise into folders
        $imagesPaths = [];

        foreach ($request->file('images') as $image) {
            $mime = $image->getMimeType();
            $originalName = $image->getClientOriginalName();
            
            // $path = $image->store('images/public' . $user->id . '/' . $slug);
            // $path = $image->store('images/' . $user->id . '/' . $slug);
            $image->store('public/images/' . $user->id . '/' . $slug);
            $path = $image->store('images/' . $user->id . '/' . $slug);

            array_push($imagesPaths, [
                'path'=>$path,
                'originalName'=>$originalName,
                'mime'=>$mime
            ]);
        }

        $motorbike->images = json_encode($imagesPaths);
        $motorbike->thumbnail_url = $imagesPaths[0]['path'];

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
        


        $motorbike->save();
        return view('pages/motorbike', [
            'motorbike' => $motorbike,
            'images' => json_decode($motorbike->images)
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // show all categories
    public function all()
    {
        return view('pages/categories', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('pages/category', [
            'category' => $category
        ]);
    }

    // find or fail
    public function findOrFail($id)
    {
        return Category::findOrFail($id);
    }

    // find all categories
    public function findAll()
    {
        return Category::all();
    }

}

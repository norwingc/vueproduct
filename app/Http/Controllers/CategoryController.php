<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        return response()->json([
            'categories' => Category::get()
        ]);
    }

}

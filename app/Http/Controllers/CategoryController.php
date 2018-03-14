<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * [__construct description]
     */
    function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

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

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name'        => 'required'
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'saved'    => true,
            'category' => $category
        ]);
    }

}

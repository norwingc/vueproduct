<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
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
            'products' => Product::with('category')->get()
        ]);
    }

    /**
     * [show description]
     * @param  Product $product [description]
     * @return [type]           [description]
     */
    public function show(Product $product)
    {
       return $product->load('category');
    }

    /**
     * [sotore description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request, [
            'name'        => 'required',
            'stock'       => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $product = new Product($request->all());
        $product->user_id = \Auth::id();
        $product->save();

        return response()->json([
            'saved'   => true,
            'product' => $product
        ]);
    }

    /**
     * [destroy description]
     * @param  Product $product [description]
     * @return [type]           [description]
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product delted'
        ]);
    }
}

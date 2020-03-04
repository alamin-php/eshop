<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return response($this->viewImage(request()->product_id));
        }
        $products = Product::with('category')->orderBy('id','desc')->get();
        return view('products.index',compact('products'));
    }

    public function viewImage($product_id){
        $imageGalleris = ProductGallery::where('product_id', $product_id)->get();
        return view('products.viewImageGallery',compact('imageGalleris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name','id');
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->is_active = 1;
        $product->image('image', $product);
            if ($product->save()) {
                ProductGallery::imageGallery('imageGalleris', $product->id);
            }
            return redirect()->route('products.index')->with('status', 'Product Added in Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('category_name','id');
        $imageGalleris = ProductGallery::where('product_id',$product->id)->get();
        return view('products.edit',compact('categories','product','imageGalleris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->is_active = $request->is_active;
        $product->image('image', $product);
            if ($product->save()) {
                ProductGallery::imageGallery('imageGalleris', $product->id);
            }
            return redirect()->route('products.index')->with('status', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
                if ($product->destroy(request()->id)) {
                return redirect()->route('products.index')->with('status', 'Product Deleted!');
        }
    }
}

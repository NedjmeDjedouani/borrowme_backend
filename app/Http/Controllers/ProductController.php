<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return ProductResource::collection(Product::all()) ;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        $product =new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->barcode=$request->barcode;

        $product->save();
return response()->json(["id" =>$product->id],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

       return ProductResource::make(Product::find($id)) ;
    }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {

$product=Product::find($id);
        $product->name=$request->input('name')==null ? $product->name :$request->input('name')  ;
        $product->price=$request->input('price') ==null ? $product->price : $request->input('price');
        $product->barcode=$request->input('barcode') ==null ? $product->barcode  :$request->input('barcode');
        $product->save();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        return Product::destroy($id);
      
    }
}

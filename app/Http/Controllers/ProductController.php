<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $products = Product::all();
        return view('Admin.Dashboard',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
         return view('AdminProduct.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $product=new Product();
      $product->name=$request->name;
     // $product->category_id=$request->categories_ids;
     $product->description=$request->description;
      $product->price=$request->price;
      $product->save();
      $product->categories()->sync($request->categories_ids);
      return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view('AdminProduct.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();

        return view('AdminProduct.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product)
    {
        
        $product=new Product();
      $product->name=$request->name;
     // $product->category_id=$request->categories_ids;
     $product->description=$request->description;
      $product->price=$request->price;
      $product->save();
      $product->categories()->sync($request->categories_ids);
      return redirect()->route('products.show',$product);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         $product->delete();
     return back();
    }

    public function dashboard()
    {
        return redirect()->route('products.index');
    }

    public function softdelete(string $id)
    {
        $product=Product::findorfail($id);
       $product->delete();
        return redirect()->route('products.index');
    }

    public function trashed()
    {
        $products=Product::onlyTrashed()->get();
        return view('Admin.trashed',compact('products'));
    }
    public function restore(string $id)
    {
        
       $product= Product::withTrashed()->findorfail($id);
       $product->restore();
    //    return response('restores sucsesfuly');
       return back();
    }


    public function forceDelete(string $id){
        $product = Product::withTrashed()->findOrFail($id);
        $product->forceDelete();

        return back();
    }


   
}

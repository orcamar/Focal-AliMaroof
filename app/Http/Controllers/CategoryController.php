<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories= Category::all();
      return view('AdminCategory.listAndCreate',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('AdminCategory.listAndCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        
        $category->save();
        $categories= Category::all();
        return view('AdminCategory.listAndCreate',compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        return view('AdminCategory.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('AdminCategory.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $category=new Category();
        $category->name=$request->name;

        $category->save();
        $categories= Category::all();
        return view('AdminCategory.listAndCreate',compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
       
       return redirect()->route('categories.index')->with('success', 'Category deleted sucsesfuly.');
    }
}

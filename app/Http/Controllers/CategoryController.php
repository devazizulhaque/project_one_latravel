<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public $categories, $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.add-category');
    }

    public function store(Request $request)
    {
        Category::createCategory($request);
        return redirect()->back()->with('success', 'Category Created Successfully..');
    }

    public function manageCategory(){
        $this->categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.manage', ['categories' => $this->categories]);
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
    public function editCategory($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit', ['category' => $this->category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/manage-category')->with('success', 'Category Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category = Category::find($id);
        $this->category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully...');
    }
}

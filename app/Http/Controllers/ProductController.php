<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products, $product, $categories, $brands, $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();
        return view('admin.product.add-product', [
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    public function store(Request $request)
    {
        Product::createProduct($request);
        return redirect()->back()->with('success', 'Category Created Successfully..');
    }

    public function manageProduct(){
        $this->products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.manage', ['products' => $this->products]);
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
    public function editProduct($id)
    {
        $this->categories = Category::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();
        $this->product = Product::find($id);
        return view('admin.product.edit', [
            'product' => $this->product,
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image)){
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully...');
    }
}

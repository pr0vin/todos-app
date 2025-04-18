<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {


        $products = Product::with('product_category')->get();

        return $products;
        return view('products.index');
    }

    public function show($id)
    {
        return view('products.show', compact('id'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Logic to store product
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        return view('products.edit', compact('id'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update product
        return redirect()->route('products.index');
    }
    public function destroy($id)
    {
        // Logic to delete product
        return redirect()->route('products.index');
    }
}

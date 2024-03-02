<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // dd($request);
        $newProduct = new Product(
            [
                'product_name' => $request->input('name'),
                'product_description' => $request->description,
                'product_price' => $request->price
            ]
        );
        $newProduct->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productToedit = Product::where('id', $id)->get()->first();
        return view('products.edit', ['product' => $productToedit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $getProduct = Product::where('id', $id)->get()->first();
        $getProduct->product_name = $request->input('name');
        $getProduct->product_description = $request->input('description');
        $getProduct->product_price = $request->input('price');
        $getProduct->update();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productToDelete = Product::where('id', $id);
        if ($productToDelete) {
            $productToDelete->delete();
            return redirect()->route('products.index');
        }
        // dd($id);
    }
}

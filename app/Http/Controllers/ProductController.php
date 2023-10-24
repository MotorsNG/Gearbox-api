<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Products::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Products::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Products::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Search the specified resource from storage.
     */
    public function search(string $name)
    {
        return Products::where('name', 'like', '&'.$name.'%')->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::destroy($id);
    }
}

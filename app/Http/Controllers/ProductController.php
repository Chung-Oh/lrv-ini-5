<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Scopes\ActivatedScope;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Products as ProductsResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Product::find(4)->delete();
        // Product::withTrashed()->find(4)->restore();
        // Product::onlyTrashed()->forceDelete(); // Remove definitivo
        // return new ProductsResource(Product::withTrashed()->get()); // Todos e os removidos
        // return Product::onlyTrashed()->get(); // Somenete removidos
        // return new ProductsResource(Product::withoutGlobalScope('isActivated')->get()); // Traz todos, ignorando o Global Scope da Model, essa linha não funciona pelo fato de ter criado a classe ActivatedScope
        // return new ProductsResource(Product::withoutGlobalScope(ActivatedScope::class)->get()); // Traz todos, ignorando o Global Scope da Model
        return new ProductsResource(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class productsController extends Controller
{

    public function index()
    {
        $products_ =  Products::all(); // obtiene todos los registros
        return $products_;
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
    public function store(Request $request) // save
    {
        $products_ = new Products();
        $products_->name = $request->name;
        $products_->type = $request->type;
        $products_->size = $request->size;
        $products_->save();
        return $products_;
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
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $products = Products::query()->findOrFail($id);
        $products->name = $request->name;
        $products->size = $request->size;
        $products->type = $request->type;

        $products->save();

        return $products;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::destroy($id);
        return $products;
    }
}

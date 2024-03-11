<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVegetableRequest;
use App\Http\Requests\UpdateVegetableRequest;
use App\Models\Vegetable;

class VegetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVegetableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vegetable $vegetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vegetable $vegetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVegetableRequest $request, Vegetable $vegetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vegetable $vegetable)
    {
        //
    }
}

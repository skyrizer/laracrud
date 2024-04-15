<?php

namespace App\Http\Controllers;

use App\Models\node;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenodeRequest;
use App\Http\Requests\UpdatenodeRequest;

class NodeController extends Controller
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
    public function store(StorenodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenodeRequest $request, node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(node $node)
    {
        //
    }
}

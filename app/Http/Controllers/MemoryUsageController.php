<?php

namespace App\Http\Controllers;

use App\Models\MemoryUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoryUsageRequest;
use App\Http\Requests\UpdateMemoryUsageRequest;

class MemoryUsageController extends Controller
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
    public function store(StoreMemoryUsageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MemoryUsage $memoryUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemoryUsage $memoryUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoryUsageRequest $request, MemoryUsage $memoryUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemoryUsage $memoryUsage)
    {
        //
    }
}

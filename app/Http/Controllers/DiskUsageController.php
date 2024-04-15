<?php

namespace App\Http\Controllers;

use App\Models\DiskUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiskUsageRequest;
use App\Http\Requests\UpdateDiskUsageRequest;

class DiskUsageController extends Controller
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
    public function store(StoreDiskUsageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DiskUsage $diskUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiskUsage $diskUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiskUsageRequest $request, DiskUsage $diskUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiskUsage $diskUsage)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CpuUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCpuUsageRequest;
use App\Http\Requests\UpdateCpuUsageRequest;

class CpuUsageController extends Controller
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
    public function store(StoreCpuUsageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CpuUsage $cpuUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CpuUsage $cpuUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCpuUsageRequest $request, CpuUsage $cpuUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CpuUsage $cpuUsage)
    {
        //
    }
}

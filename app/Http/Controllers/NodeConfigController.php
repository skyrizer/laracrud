<?php

namespace App\Http\Controllers;

use App\Models\NodeConfig;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNodeConfigRequest;
use App\Http\Requests\UpdateNodeConfigRequest;
use Illuminate\Http\Response;


class NodeConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all node configurations
        $nodeConfigs = NodeConfig::all();
        
        // Return the node configurations as JSON with HTTP response code 200 (OK)
        return response()->json(['nodeConfigs' => $nodeConfigs], Response::HTTP_OK);
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
    public function store(StoreNodeConfigRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NodeConfig $nodeConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NodeConfig $nodeConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNodeConfigRequest $request, NodeConfig $nodeConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NodeConfig $nodeConfig)
    {
        //
    }
}

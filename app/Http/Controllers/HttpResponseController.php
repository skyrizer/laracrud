<?php

namespace App\Http\Controllers;

use App\Models\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHttpResponseRequest;
use App\Http\Requests\UpdateHttpResponseRequest;
use Illuminate\Http\Response;


class HttpResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $httpResponse = HttpResponse::all(); 
        
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['httpResponse' => $httpResponse], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHttpResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HttpResponse $httpResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HttpResponse $httpResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHttpResponseRequest $request, HttpResponse $httpResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HttpResponse $httpResponse)
    {
        //
    }
}
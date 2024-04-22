<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRoleRequest;
use App\Http\Requests\UpdateUserRoleRequest;
use Illuminate\Http\Response;


class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $roles = UserRole::all(); 
    
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['roles' => $roles], Response::HTTP_OK);
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
    public function store(StoreUserRoleRequest $request)
    {
        //validate fields
        $attrs = $request->validate([
            'role' => 'required'

        ]);

        //create user
        $role = UserRole::create([
            'role' => $attrs['role']
        ]);

        //return user & token in response
        return response([
            'role' => $role,
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRole $userRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRoleRequest $request, UserRole $userRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole)
    {
        //
    }
}

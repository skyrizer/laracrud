<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolePermissionRequest;
use App\Http\Requests\UpdateRolePermissionRequest;

class RolePermissionController extends Controller
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
    public function store(StoreRolePermissionRequest $request)
    {
         //validate fields
         $attrs = $request->validate([
            'role_id' => 'required|exists:role,id',
            'permission_id' => 'required|exists:permission,id',

        ]);

        //create user
        $rolePermission = RolePermission::create([
            'role_id' => $attrs['role_id'],
            'permission_id' => $attrs['permission_id']
        ]);

        //return user & token in response
        return response([
            'rolePermission' => $rolePermission,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolePermissionRequest $request, RolePermission $rolePermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RolePermission $rolePermission)
    {
        //
    }
}

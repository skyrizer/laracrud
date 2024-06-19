<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolePermissionRequest;
use App\Http\Requests\UpdateRolePermissionRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rolePermissions = RolePermission::with('role', 'permission')
                        ->get();
            
    
        return response()->json(['rolePermissions' => $rolePermissions], Response::HTTP_OK);
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

    public function delete($roleId, $permissionId)
    {
        // Find the node config based on both node ID and config ID
        $rolePermission = RolePermission::where('role_id', $roleId)->where('permission_id', $permissionId)->first();
    
        if (!$rolePermission) {
            return response()->json(['message' => 'Role permission not found'], 404);
        }
    
        $rolePermission->delete();
    
        return response()->json(['message' => 'Role permission deleted successfully'], 200);
    }

}

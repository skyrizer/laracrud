<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TestAPI extends Controller
{
    /**
     * Log the incoming request IP address.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logIp(Request $request)
    {
        // Log the IP address
        \Log::info('IP Address logged:', ['ip_address' => $request->ip()]);

        return response()->json(['message' => 'IP address has been logged successfully!']);
    }
}

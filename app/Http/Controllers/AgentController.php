<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function handlePostRequest(Request $request)
    {
        $data = $request->json()->all();
        if (isset($data['ipconfig_output'])) {
            $ipconfigOutput = $data['ipconfig_output'];
            // Perform any processing with the received data
            \Log::info('Received ipconfig output: ' . $ipconfigOutput);
            return response()->json(['message' => 'IPConfig output received successfully']);
        } else {
            return response()->json(['error' => 'Invalid request data'], 400);
        }
    }
    
}

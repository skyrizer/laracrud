<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AgentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/agents",
     *     tags={"Agents"},
     *     summary="Receive performance data from agent",
     *     description="Endpoint to receive performance data from the agent",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="performance", type="string")
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="400", description="Invalid request data")
     * )
     */
    public function handlePostRequest(Request $request)
    {
        $data = $request->json()->all();
        
        if (isset($data['performance'])) {
            $performanceOutput = $data['performance'];
            // Perform any processing with the received data
            \Log::info('Received performance output: ' . $performanceOutput);
            return response()->json(['message' => 'Performance output received successfully']);
        } else {
            return response()->json(['error' => 'Invalid request data'], 400);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use App\Models\DiskUsage;
use App\Models\MemoryUsage;
use App\Models\CpuUsage;
use App\Models\NetworkUsage;
use App\Models\Container;




class AgentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/agent",
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
        
        if (isset($data['performance']) && is_array($data['performance'])) {
            foreach ($data['performance'] as $performanceData) {
                // Extract container information
                $containerId = $performanceData['CONTAINER ID'];
                $name = $performanceData['NAME'];
                $cpu = $performanceData['CPU %'];
                $memUsage = $performanceData['MEM USAGE'];
                $memSize = $performanceData['MEM SIZE'];
                $netInput = $performanceData['NET INPUT'];
                $netOutput = $performanceData['NET OUTPUT'];
                $blockInput = $performanceData['BLOCK INPUT'];
                $blockOutput = $performanceData['BLOCK OUTPUT'];
                $pids = $performanceData['PIDS'];
    
                    // Insert into database with associated node_id
                    DiskUsage::create([
                        'container_id' => $containerId,
                        'input' => $blockInput,
                        'output' => $blockOutput
                    ]);
    
                    // Insert into database with associated node_id
                    MemoryUsage::create([
                        'container_id' => $containerId,
                        'usage' => $memUsage,
                        'size' => $memSize
                    ]);
    
                    // Insert into database with associated node_id
                    NetworkUsage::create([
                        'container_id' => $containerId,
                        'input' => $netInput,
                        'output' => $netOutput
                    ]);
    
                    // Insert into database with associated node_id
                    CpuUsage::create([
                        'container_id' => $containerId,
                        'percentage' => $cpu
                    ]);

            }
    
            // Perform any processing with the received data
            \Log::info('Received container data: ' . json_encode($data['performance']));
            return response()->json(['message' => 'Performance output received successfully']);
        } else {
            return response()->json(['error' => 'Invalid request data'], 400);
        }
    }


    
}

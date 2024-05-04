<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\CpuUsage;
use App\Models\DiskUsage;
use App\Models\MemoryUsage;
use App\Models\NetworkUsage;


class PerformanceController extends Controller
{
    public function performance(Request $request)
    {
        $containerID = $request->input('containerID');

        // Fetch disk usage data for the specified containerID
        $diskUsageData = DiskUsage::where('container_id', $containerID)->first();

        // Fetch CPU usage data for the specified containerID
        $cpuUsageData = CPUUsage::where('container_id', $containerID)->first();

        // Fetch memory usage data for the specified containerID
        $memoryUsageData = MemoryUsage::where('container_id', $containerID)->first();

        // Fetch network usage data for the specified containerID
        $networkUsageData = NetworkUsage::where('container_id', $containerID)->first();

        // Centralize the data by container ID
        $centralizedData = [
            'container_id' => $containerID,
            'diskUsage' => $diskUsageData,
            'cpuUsage' => $cpuUsageData,
            'memoryUsage' => $memoryUsageData,
            'networkUsage' => $networkUsageData
        ];
        return $centralizedData;
    }

    public function performanceForAllContainers(Request $request)
    {
        // Get the nodeId from the request body
        $nodeId = $request->input('nodeId');
        
        \Log::info('Node ID: ' . $nodeId);

        // Fetch containers associated with the nodeId
        $containers = Container::where('node_id', $nodeId)->get();

        if ($containers->isEmpty()) {
            return response()->json(['error' => 'No containers found for the provided node ID'], 404);
        }

        \Log::info('containers: ' . $containers);


        $performanceData = [];
    
        // Loop through each container
        foreach ($containers as $container) {
            $containerID = $container->id;
            $containerName = $container->name;
    
            // Fetch performance data for the current container
            $performanceData[$containerName]['diskUsage'] = DiskUsage::where('container_id', $containerID)
                ->orderByDesc('created_at')
                ->first() ?? [];
    
            $performanceData[$containerName]['cpuUsage'] = CPUUsage::where('container_id', $containerID)
                ->orderByDesc('created_at')
                ->first() ?? [];
    
            $performanceData[$containerName]['memoryUsage'] = MemoryUsage::where('container_id', $containerID)
                ->orderByDesc('created_at')
                ->first() ?? [];
    
            $performanceData[$containerName]['networkUsage'] = NetworkUsage::where('container_id', $containerID)
                ->orderByDesc('created_at')
                ->first() ?? [];
        }
    
        return $performanceData;
    }

}

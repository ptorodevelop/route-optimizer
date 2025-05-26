<?php

namespace App\Services\Route;

use App\Models\Constant;
use Symfony\Component\Process\Process;

class RouteService
{

    public function optimizeRoute($request)
    {
        $points = $request->input('points');
        $data = json_encode(['points' => $points]);

        $process = new Process([
            'C:\\Users\\pedro.toro\\AppData\\Local\\Programs\\Python\\Python314\\python.exe',
            base_path('christofides_solver.py')
        ]);
        $process->setInput($data);
        $process->run();

        if ($process->isSuccessful()) {
            $result = json_decode($process->getOutput(), true);
            $orderedRoute = [];

            if (isset($result['order'])) {
                foreach ($result['order'] as $idx) {
                    $orderedRoute[] = $points[$idx];
                }
            }

            return [
            'status' => true,
            'message' => 'Se ordenó de forma exitosa',
            'data' => [
                'order' => $result['order'],
                'route' => $orderedRoute,
            ],
        ];
        }

        return [
            'status' => false,
            'message' => 'Error al ejecutar el script: ' . $process->getErrorOutput(),
            'data' => [],
        ];
    }
}

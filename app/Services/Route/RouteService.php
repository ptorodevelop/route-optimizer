<?php

namespace App\Services\Route;

use App\Models\Constant;

class RouteService
{

    public function optimizeRoute($points)
    {
        $message = 'llegue de forma exitosa';
        return ['status' => true, 'message' => $message, 'data' => ['points' => $points]];
    }
}

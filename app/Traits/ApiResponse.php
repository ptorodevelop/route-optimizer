<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
	protected function responseJson(bool $success, string $message, $data, int $code = 200) : JsonResponse
	{
		return response()->json(["status" => $success, "message" => $message, "data" => $data], $code);
	}
}

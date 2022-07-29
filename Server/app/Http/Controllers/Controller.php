<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="VatzApp API", version="1.0")
 * @OA\SecurityScheme(
 *    securityScheme="bearer",
 *    type="http",
 *    scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function send_response($msg, $payload, $status = 200)
    {
        $data  = [
            "status_code" => $status,
            "message" => $msg,
            "payload" => $payload
        ];

        return response()->json($data, 200);
    }

    protected function send_validation_error_response($msg = "Validation errors", $status = 400)
    {
        return $this->send_response($msg, null, $status);
    }

    protected function send_error_response($msg = "Error", $status = 403)
    {
        return $this->send_response($msg, null, $status);
    }
}

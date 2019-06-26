<?php

namespace App\Helpers;

class ResponseHelpers {

    public function success($message = 'sucesso')
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => $message
        ], 200);
    }

    public function error($message = 'error', $statusCode = 500)
    {
        return response()->json([
            'status' => false,
            'statusCode' => $statusCode,
            'message' => $message,
        ]);
    }
}
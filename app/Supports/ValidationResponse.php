<?php

namespace App\Supports;

class ValidationResponse
{
    public static function response($errors)
    {
        $response               = create_response();
        $response->status_code  = 400;
        $response->message      = "Validation error!";
        $response->data         = $errors;

        return \response()->json($response, 400);
    }
}

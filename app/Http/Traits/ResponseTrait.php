<?php

namespace App\Http\Traits;


trait ResponseTrait
{
    public function returnResponse(int $statuscode, string $msg, $data, bool $isSuccess, $errors = [])
    {
        return response()->json(
            [
                "data" => $data,
                "msg" => $msg,
                "isSuccess" => $isSuccess,
                "errors" => $errors
            ]
        )->setStatusCode($statuscode);
    }
}

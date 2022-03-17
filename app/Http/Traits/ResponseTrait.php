<?php

namespace App\Http\Traits;


trait ResponseTrait
{
    public function returnResponse(int $statuscode, string $msg,$data, bool $isSuccess)
    {
        return response()->json(
            [
                "status" => $statuscode,
                "data" => $data,
                "msg" => $msg,
                "isSuccess" => $isSuccess
            ]
        );
    }
}

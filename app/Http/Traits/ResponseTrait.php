<?php

namespace App\Http\Traits;

use GrahamCampbell\ResultType\Success;

trait ResponseTrait
{
    public function returnResponse($statuscode, $msg, $data, $isSuccess)
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

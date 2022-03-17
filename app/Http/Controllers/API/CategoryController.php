<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use ResponseTrait;

    public  function index()
    {
        $categories = [['name' => "ahmed"], ['name' => "hsn"]];
        return $this->returnResponse(200,"done",$categories,true);
    }
}

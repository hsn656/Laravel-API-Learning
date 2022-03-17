<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function index()
    {
        $categories = [['name' => "ahmed"], ['name' => "hsn"]];
        return response()->json($categories);
    }
}

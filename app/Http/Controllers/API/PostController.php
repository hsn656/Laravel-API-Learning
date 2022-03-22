<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\API\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("checkToken");
    }


    use ResponseTrait;

    public function index()
    {
        $posts = Post::with("user")->get();
        return $this->returnResponse(200, "success", $posts, true);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\API\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ResponseTrait;


    public function __construct()
    {
        // $this->middleware("checkToken");
    }

    public function index()
    {
        $posts = Post::with("user")->get();
        return $this->returnResponse(200, "success", $posts, true);
    }

    public function getPost(int $id)
    {
        $post = Post::with("user")->where("id",$id)->get();

        if(!$post)
            return $this->returnResponse(400,);


        return $this->returnResponse(200, "success", $posts, true);
    }


}

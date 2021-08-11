<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $req)
    {
        $id = $req->input('id');
        $limit = $req->input('limit');
        $name = $req->input('id');
        $description = $req->input('description');
        $tags = $req->input('tags');
    }
}

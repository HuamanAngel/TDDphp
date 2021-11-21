<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagList()
    {
        $tags = Tag::all();
        // return response()->json([
        //     'res'=>true,
        //     'data'=>$tags
        // ]);
        // return 0;
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        //
    }
    public function tagShowAllCourse(){
        //
    }
}

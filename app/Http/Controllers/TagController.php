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
        return response()->json([
            'res'=>true,
            'data'=>$tags
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'tag_name' => 'required|string|max:20',
        ]);
        $tag = Tag::create([
            'tag_name'=>$request->tag_name
        ]);
        return response()->json([
            'res'=>true,
            'data'=>$tag
        ]);
    }

    public function tagShowAllCourse(){
        $tags = Tag::all();
        $courses = [];
        foreach($tags as $tag){
            $courses[]=$tag->tagCourse;
        }

        return response()->json([
            'res'=>true,
            'data'=>$courses
        ]);        
    }
}

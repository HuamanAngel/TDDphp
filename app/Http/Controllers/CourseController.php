<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function listCourse()
    {
        $courses = Course::all();
        return response()->json([
            'res'=>true,
            'data'=>$courses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:10|max:20',
            'description'=>'required'
        ]);
        $course = Course::create([
            'course_name'=>$request->name,
            'course_description'=>$request->description,
            'tag_id'=>1
        ]);
        return response()->json([
            'res'=>true,
            'data'=>$course
        ]);
    }
}

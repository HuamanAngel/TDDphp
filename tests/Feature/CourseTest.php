<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */   
    public function testMinNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghij',
            'description' => 'abcdefghij',
        ]);
        $this->assertDatabaseHas('courses',$course->json()['data']);
    }
    /** @test */   
    public function testMaxNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghijklmnopqrsm',
            'description' => 'abcdefghijklmnopqrsm',
        ]);
        $this->assertDatabaseHas('courses',$course->json()['data']);

    }
    /** @test */   
    public function testInfNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghi',
            'description' => 'abcdefghi',
        ]);
        $course->assertJsonStructure([
            'message',
        ]);

    }
    /** @test */   
    public function testSupNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghijklmnopqrsmxxxxxxx',
            'description' => 'abcdefghi',
        ]);
        $course->assertJsonStructure([
            'message',
        ]);
    }


    /** @test */   
    public function testMidNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghijklmno',
            'description' => 'abcdefghijklmnopqrsm',
        ]);
        $this->assertDatabaseHas('courses',$course->json()['data']);
    }   
    /** @test */   
    public function testListCourse()
    {
        $course = $this->json('GET','/api/course');
        $course->assertJsonStructure([
            'res',
            'data' => [
                '*' => [
                    'id',
                    'course_name',
                    'course_description',
                    'tag_id',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);

    }       

}


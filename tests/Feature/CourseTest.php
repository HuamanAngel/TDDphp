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
        $course->assertDatabaseHas('courses',[
            'name' => 'abcdefghij',
            'description' => 'abcdefghij',
        ]);
    }
    /** @test */   
    public function testMaxNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghijklmnopqrsm',
            'description' => 'abcdefghijklmnopqrsm',
        ]);
        $course->assertDatabaseHas('courses',[
            'name' => 'abcdefghijklmnopqrsm',
            'description' => 'abcdefghijklmnopqrsm',
        ]);

    }
    /** @test */   
    public function testInfNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghi',
            'description' => 'abcdefghi',
        ]);
        $course->assertJsonStructure([
            'res',
            'data' => [
                'error',
            ],
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
            'res',
            'data' => [
                'error',
            ],
        ]);        
    }


    /** @test */   
    public function testMidNameCourse()
    {
        $course = $this->json('POST','/api/course',[
            'name' => 'abcdefghijklmno',
            'description' => 'abcdefghijklmnopqrsm',
        ]);
        $course->assertDatabaseHas('courses',[
            'name' => 'abcdefghijklmno',
            'description' => 'abcdefghijklmnopqrsm',
        ]);        
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


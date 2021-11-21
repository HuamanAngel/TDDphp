<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class TagTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */   
    public function testListTags()
    {
        $tags = $this->json('GET','/api/tag');
        $tags->assertJsonStructure([
            'res',
            'data' => [
                '*' => [
                    'id',
                    'tag_name',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
        // $this->json('GET', '/api/tag')
        //     ->assertStatus(200)
        //     ->assertJson([
        //         'res' => true,
        //         'data' => 'avacsa'
        //     ]);
        // $this->json('GET','api/tag');
    }

    /** @test */   
    public function testAddTag()
    {
        $tag = $this->json('POST','/api/tag',[
            'tag_name' => 'test'
        ]);
        $tag->assertJsonStructure([
            'res',
            'data' => [
                'id',
                'tag_name',
                'created_at',
                'updated_at'
            ]
        ]);
    }    

    /** @test */
    public function testRelationTag(){
        $course = $this->json('GET','/tag/courses');
        $course->assertJsonStructure([
            'res',
            'data' => [
                '*' => [
                    'id',
                    'course_name',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
    }


    /** @test */   
    public function testAddMaxCharacters()
    {
        $tag = $this->json('POST','/api/tag',[
            'tag_name' => 'testtesttesttesttesttest'
        ]);
        $tag->assertJsonStructure([
            'res',
            'data' => [
                'errors',
            ]
        ]);
    }       
}

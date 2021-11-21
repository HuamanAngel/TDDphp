<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;

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
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    /** @test */   
    public function testAddMaxCharacters()
    {
        $tag = $this->json('POST','/api/tag',[
            'tag_name' => 'testtesttesttesttesttesdwdawt'
        ]);
        $tag->assertJsonStructure([
            'message',
        ]);
    }       
}

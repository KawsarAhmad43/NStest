<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_candidate_page()
    {
        $response = $this->get('/candidate');

        $response->assertStatus(200);
    }


  










}

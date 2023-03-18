<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_form_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('company.form');
    }


    public function test_form_detail_page()
    {
        $response = $this->get('/show/AAME');

        $response->assertStatus(200);
        $response->assertViewIs('company.show');
    }

    public function test_form_detail_unauthorized_page()
    {
        $response = $this->get('/show');
        $response->assertStatus(404);
    }
}

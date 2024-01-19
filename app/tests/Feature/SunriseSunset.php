<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SunriseSunset extends TestCase
{
    /** @test */
    public function only_access_screen() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @teste */
    public function send_resquest_without_latitude() {

    }

    /** @teste */
    public function send_resquest_without_longitude() {

    }

    /** @teste */
    public function send_resquest_complete() {

    }
}

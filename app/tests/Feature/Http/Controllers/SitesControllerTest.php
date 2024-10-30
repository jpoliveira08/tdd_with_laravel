<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SitesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_create_sites()
    {
        /**
         * When you use validation, what happens is an exception is throw
         * and Laravel exception handling picks the exception and turn
         * into a proper response
         */
        $this->withoutExceptionHandling();
        // create a user
        $user = User::factory()->create();

        // make a post request to a route to create a site
        $response = $this
            ->followingRedirects() // Tells to Laravel follow redirects
            ->actingAs($user)
            ->post(route('sites.store'), [
            'name' => 'Google',
            'url' => 'https://google.com'
        ]);

        // make sure the site exists within the database
        $site = Site::first();
        $this->assertEquals(1, Site::count());

        // Check if the site name stored is right
        $this->assertEquals('Google', $site->name);
        // Check if the site url stored is right
        $this->assertEquals('https://google.com', $site->url);
        // Check if the site is offline
        $this->assertNull($site->is_online);
        // check if the site belongs to the user created
        $this->assertEquals($user->id, $site->user_id);

        // see site's name on the page
        $response->assertSeeText('Google');

        // check if we are in the correct URL
        $this->assertEquals(route('sites.show', $site), url()->current());
    }
}

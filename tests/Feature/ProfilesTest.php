<?php

namespace NIHILCo\Forums\Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\Databasetransactions;

class ProfilesTest extends TestCase
{
    use Databasetransactions;

    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }

    public function test_a_user_has_a_profile()
    {
        $this->get('/forums/profiles/' . $this->user->username)
             ->assertSee($this->user->username);
    }

    public function test_profiles_display_all_threads_created_by_user()
    {
        $threadOne = create('NIHILCo\Forums\Models\Thread', ['user_id' => $this->user->id]);

        $this->get('/forums/profiles/' . $this->user->username)
             ->assertSee($threadOne->title);        
    }
}
<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\RegisteredUserController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUniqueSlugTest extends TestCase
{

    use RefreshDatabase;
    protected $seed = true;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_creates_a_counter_for_duplicate_business_records()
    {
        // nick is already in the database.
        $this->assertEquals('nick-1', RegisteredUserController::makeSlugUnique('nick'));
    }
}

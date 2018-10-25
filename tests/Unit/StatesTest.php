<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\State;

class StatesTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_state_is_inserted()
    {
        $state = new State;
        $state->setName('Test');
        $state->setLimit('1');

        $this->assertEquals('Test', $state->name);
        $this->assertEquals('1', $state->limit);
    }

//    public function test_state_is_edited()
//    {
//       $state = State
//
//    }
}

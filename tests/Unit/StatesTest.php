<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatesTest extends TestCase
{
    // If you don't want your test database to be reset after tests are finished comment this out
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_form_for_adding_states_show()
    {
        $response = $this->get('/add_state');

        $response->assertStatus(200);
        $response->assertSee('Adding State');
    }

    public function test_if_state_is_created()
    {
        $state = new \App\State;
        $stateData = [
            'name' => 'To Do',
            'limit' => '2'
        ];

        $state->insert($stateData);

        $this->assertDatabaseHas('states', ['name' => 'To Do']);
    }

    public function test_if_state_is_created_even_without_limit_speciied()
    {
        $state = new \App\State;
        $stateData = [
            'name' => 'To Do'
        ];

        $state->insert($stateData);

        $this->assertDatabaseHas('states', ['name' => 'To Do']);
    }

    public function test_if_form_for_editing_states_show()
    {
        $state = \App\State::where('name', 'To Do')->first();

        $response = $this->get('/edit_state/' . $state->id);

        $response->assertSee('Edit State');
    }

    public function test_if_state_is_updated()
    {
        $state = new \App\State;
        $stateData = [
            'name' => 'Proba Update-a',
            'limit' => '2'
        ];
        $state->insert($stateData);

        $state1 = \App\State::where('name', 'Proba Update-a')->first();
        $state1Data = [
            'name' => 'Something else',
            'limit' => 7
        ];
        $state1->update($state1Data, [$state1->id]);

        $this->assertDatabaseHas('states', ['name' => 'Something else']);
    }

    public function test_if_state_is_updated_without_limit()
    {
        $state = new \App\State;
        $stateData = [
            'name' => 'Proba Update-a',
            'limit' => '2'
        ];
        $state->insert($stateData);

        $state1 = \App\State::where('name', 'Proba Update-a')->first();
        $state1Data = [
            'name' => 'Something else'
        ];
        $state1->update($state1Data, [$state1->id]);

        $this->assertDatabaseHas('states', ['name' => 'Something else']);
    }

    public function test_if_state_is_deleted() {
        $state = \App\State::where('name', 'Something else')->first();

        $state->delete($state->id);

        $this->assertDatabaseMissing('states', ['id' => $state->id, 'name' => $state->name, 'limit' => $state->limit]);
    }
}

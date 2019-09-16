<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

use App\Necessity;

class NecessityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUrlNecessity()
    {
        $response = $this->get('/necessity');

        $response->assertStatus(200);
        // $response->assertSee('Daftar Keperluan');
    }

    public function testInsertNecessity()
    {
        $necessity  = new Necessity;
        $this->json('GET', '/necessity/store', ['name' => 'banyak']);
        $this->assertEquals(1, $necessity->all()->count());
    }

    public function testDeleteNecessity()
    {
        $necessity = Necessity::where('name', 'banyak')->first();

        $this->json('GET', '/necessity/destroy', ['id' => $necessity->id]);
        $this->assertDatabaseMissing('necessity', ['id' => $necessity->id]);
    }
}

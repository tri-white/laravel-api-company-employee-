<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Companies;

class CompaniesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/companies');

        $response->assertStatus(200);
    }
    use RefreshDatabase;

    public function testDestroy()
    {
        $company = Companies::factory()->count(1)->create();
        $company = Companies::all()->first();
        $id = $company->id;
        $ajaxResponse = $this->delete(route('companies.destroy', ['company' => $id]), [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        // Check the response for an AJAX request
        $ajaxResponse->assertJson(['Deleted'])
            ->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Sale;
use Tests\ApiTestTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SaleTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_sale()
    {
        $sale = Sale::factory()->make()->toArray();
        // $sale['students'] = "1,2";
        $createdSale = Sale::create($sale);

        $createdSale = $createdSale->toArray();
        $this->assertArrayHasKey('id', $createdSale);
        $this->assertNotNull($createdSale['id'], 'Created Sale must have id specified');
        $this->assertNotNull(Sale::find($createdSale['id']), 'Sale with given id must be in DB');
        $this->assertModelData($sale, $createdSale);
    }

    public function test_read_sale()
    {
        $sale =  Sale::factory()->create();

        $dbSale = Sale::find($sale->id);

        $dbSale = $dbSale->toArray();
        $this->assertModelData($sale->toArray(), $dbSale);
    }

    public function test_update_sale()
    {
        $sale =  Sale::factory()->create();
        $fakeSale = Sale::factory()->make()->toArray();

        $updatedSale = Sale::find($sale->id) ; 
        $updatedSale->update($fakeSale);
        $this->assertModelData($fakeSale, $updatedSale->toArray());
        $dbSale = Sale::find($sale->id);
        $this->assertModelData($fakeSale, $dbSale->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sale()
    {
        $sale =  Sale::factory()->create();

        $resp = Sale::find($sale->id)->delete();

        $this->assertTrue($resp);
        $this->assertNull(Sale::find($sale->id), 'Sale should not exist in DB');
    }


    public function test_post_create_sale()
    {
        $sale = Sale::factory()->make()->toArray();
        $this->response = $this->json(
            'POST',
            'sales', $sale
        );
        $this->response->assertStatus(302);
        $this->assertEquals(session()->get('success') , "Sale created successfully." );
        
        // 
        // $this->assertSessionHasErrors([
        //     'application_status' => 'Application status has changed. Action not applied.'
        // ]);
    }
}

<?php

namespace Tests\Domain\Filter;

use App\Http\Controllers\Products\ProductIndexController;
use Event;
use Illuminate\Http\Request;
use Tests\TestCase;

class FilterTest extends TestCase
{

    public function test_no_filter()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function test_filter_by_city()
    {
        Event::fake();
        $request = Request::create('/', 'GET',[
            'city'     =>  '1'
        ]);
        $controller = new ProductIndexController();
        $response = $controller($request);
        $response->assertViewHas('products');

    }

    public function test_filter_by_category()
    {
        Event::fake();
        $request = Request::create('/', 'GET',[
            'category'     =>  '1'
        ]);
        $controller = new ProductIndexController();
        $response = $controller($request);
        $response->assertViewHas('products');
    }

    public function test_filter_by_several_cities()
    {
        Event::fake();
        $request = Request::create('/', 'GET',[
            'city'     =>  ['1', '2']
        ]);
        $controller = new ProductIndexController();
        $response = $controller($request);
        $response->assertViewHas('products');
    }

    public function test_filter_by_city_category()
    {
        Event::fake();
        $request = Request::create('/', 'GET',[
            'city'     =>  ['1', '2'],
            'category' => '1'
        ]);
        $controller = new ProductIndexController();
        $response = $controller($request);
        $response->assertViewHas('products');
    }


}

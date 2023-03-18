<?php

namespace Tests\Unit;
use Mockery;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\CompanyController;
use GuzzleHttp\Client;

class MethodTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_symbol()
    {
        $client = new Client;
        $myClass = new CompanyController($client);

        $response = $myClass->getSymbol();

        $this->assertEquals(false, $response['error']);
    }

    public function test_historical_quotes()
    {
        $client = new Client;
        $myClass = new CompanyController($client);

        $response = $myClass->getHistoricalQuotes('AAME');

        $this->assertEquals(false, $response['error']);
    }
}

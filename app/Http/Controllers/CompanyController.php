<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\CompanyRequest;
use Carbon\Carbon;

class CompanyController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        try {
            $response = $this->client->request('GET', 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json');
            $companyData =  json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
            $companyData = [];
        }
        return view('company.form', compact('companyData'));
    }



    public function store(CompanyRequest $request)
    {
        $request->validated();

        //email send from here

        return redirect()->route('show', ['symbol' => $request->symbol]);

    }

    public function show($symbol)
    {

        $data = $this->getHistoricalQuotes($symbol);

        if($data['error']){
            return redirect('/')->withErrors($data['message']);
        }

        $prices = $data['value']->prices;

        $labels = [];
        $openData = [];
        $closeData = [];

        foreach ($prices as $price) {
            $labels[] = Carbon::parse($price->date)->format('M d, Y');
            $openData[] = isset($price->open) ? $price->open : 0;
            $closeData[] = isset($price->close) ? $price->close : 0;
        }

        return view('company.show',compact('labels', 'openData', 'closeData', 'prices'));

    }

    public function getHistoricalQuotes($symbol = '', $region= 'US')
    {
        try {
            $url = "https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data?symbol=$symbol&region=$region";
            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'X-RapidAPI-Key' => '953b862335msha8118778e7eab38p197f10jsn9c7698696e50',
                    'X-RapidAPI-Host' => 'yh-finance.p.rapidapi.com',
                ]
            ]);
            return
            [
                'error' => false,
                'value' => json_decode($response->getBody()->getContents())
            ];
        } catch (RequestException $e) {

            $response = $e->getResponse();
            $body = $response->getBody()->getContents();
            return
            [
                'error' => true,
                'message' => json_decode($body),
            ];
        }

    }



}

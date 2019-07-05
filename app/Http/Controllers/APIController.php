<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class APIController extends Controller
{
    protected $remote;

    public function __construct()
    {
        $this->remote = env('REMOTE_SERVER_URL');
    }

    public function getJson()
    {
        $client = new Client(); //GuzzleHttp\Client
        $results = json_decode($client->get($this->remote.'/test')->getBody()->getContents());
        
        dd($results);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class API extends Controller
{
    public function fetchClients(){
        $result = [];
        $clients = Client::all();
        foreach($clients as $client){
            $result[$client->client_code] = $client->name;
        }
        return $result;
    }
}

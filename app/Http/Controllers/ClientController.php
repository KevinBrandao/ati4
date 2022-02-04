<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Services\ClientService;
use App\Services\CalculadoraService;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    protected $clientService;
    protected $calculadoraService;

    // Método Construtor da classe:
    // @param PostService $service;

    public function __construct()
    {
         $this->clientService = new ClientService();
         $this->calculadoraService = new CalculadoraService();
    }



    public function store(StoreClientRequest $request)
    {

        $client = Client::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'id_number'=>$request->id_number
        ]);

        return response()->json($client);
    }

    public function name($name)
    {
        $client = Client::where('name', '=', $name)->get();
        return response()->json($client);
    }

    public function text($name)
    {
        $client = Client::where('name', 'LIKE', "%$name%")->get();
        return response()->json($client);
    }

    public function bills($client)
    {
        $client = Bill::where('client_id', '=', $client)->get();
        return response()->json($client);
    }

    public function expensive($valor)
    {
        $valor = Bill::where('value', '>', $valor)->get();
        return response()->json($valor);
    }

    public function between($valor1, $valor2)
    {
        $valor = Bill::where('value', '>', $valor1)->where('value', '<', $valor2)->get();
        return response()->json($valor);


    }
    public function orderName()
    {
        $order = $this->clientService->orderClient('name', 'desc', 2);
        if($order['sucess'] == true)
        {
            return $order['data'];
        }

        return $order;
    }

    public function orderEmail()
    {
        $order = $this->clientService->orderClient('email', 'desc', 50);
        if($order['sucess'])
        {
            return $order;
        }
        return $order['data'];
    }

    public function create()
    {
        return view('clients.create');
    }

    public function sum($num1, $num2)
    {
        $response = $this->calculadoraService->sum($num1, $num2);
        return $response;
    }
}

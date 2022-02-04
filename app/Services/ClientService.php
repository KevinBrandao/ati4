<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function orderClient(string $coluna, string $ordernacao, int $limite)
    {

        try {
            $client = Client::orderBy($coluna, $ordenacao)->limit($limite)->get();
        } catch (\Throwable $th) {
            return 
            [
                'sucess' => false,
                'message' => $th
            
            ]; 
        }

        return 
        [
            'sucess' => true,
            'message' => 'Deu certo',
            'data' => $client
        ];
    }
}

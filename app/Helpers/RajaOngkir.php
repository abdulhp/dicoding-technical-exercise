<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class RajaOngkir {

    static function getCity() {
        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => env('RAJA_ONGKIR_KEY')
        ]);

        return $response->json()['rajaongkir']['results'];
    }
}

<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait NameFakeTrait
{
    public function nameFake(): string
    {
        return Http::withOptions([
            'debug' => false,
            'ssl_key' => [public_path('cacert.pem'), 'password.key'],
            //'verify' => false,
        ])->get('https://api.namefake.com/english-united-states/male/')->json('name');
    }
}

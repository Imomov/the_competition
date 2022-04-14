<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

trait HashTrait
{
    public function generateHash($table=null, $alphabet = '23456789abcdefghijkmnpqrstuvwxyz', $minHashLength=6)
    {
        if (empty($table)) {
            return false;
        }

        do {
            $hash = substr(str_shuffle($alphabet), 0, $minHashLength);
        } while (DB::table($table)->where('hashid', $hash)->exists());

        return $hash;
    }
}

<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use PHPUnit\TestRunner\TestResult\Collector;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    public static $data = [
        [
            'id' => 1,
            'nama' => 'cilok',
            'kategori' => 'jajan',
            'harga' => 1000
        ],
        [
            'id' => 2,
            'nama' => 'batagor',
            'kategori' => 'makanan',
            'harga' => 8000
        ],
        [
            'id' => 3,
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => 2500
        ],
        [
            'id' => 4,
            'nama' => 'nasi campur',
            'kategori' => 'makanan',
            'harga' => 10000
        ]
    ];

    public static function allData()
    {
        return self::$data;
    }

    public static function findData($id)
    {
        $data = collect(self::$data);
        $result = $data->where('id',$id);
        return $result;
    }
}

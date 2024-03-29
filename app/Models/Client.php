<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'denomenation',
        'ice' ,
        'address',
        'tel' ,
        'email',
        'city',
        'state',
        'zipcode',
        'tp',
        'cnss',
        'idf',
        'image_path',
        'fullName',
        'telRes',
        'emailRes',
    ];
}

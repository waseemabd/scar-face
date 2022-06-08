<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';

    protected $fillable = [
        'stage',
        'name',
        'link',
        'price',
        'desc',
        'image',
    ];

    public  const create_update_rules = [

        'stage' => 'required',
        'name' => 'required',
        'link' => 'required',
        'price' => 'required|numeric',
        'desc' => 'required',
        'image' => 'required',
    ];
}

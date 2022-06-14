<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'type',
        'title',
        'image',
    ];

    public  const create_update_rules = [

        'type' => 'required',
        'image' => 'required',
    ];
}

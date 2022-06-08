<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'features';

    protected $fillable = [
        'title',
        'desc',
        'image',
    ];

    public  const create_update_rules = [

        'title' => 'required',
        'desc' => 'required',
        'image' => 'required',
    ];
}

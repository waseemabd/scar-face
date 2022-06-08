<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'name',
        'logo',
        'link',
    ];

    public  const create_update_rules = [

        'name' => 'required',
        'logo' => 'required',
    ];
}

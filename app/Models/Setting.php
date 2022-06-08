<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'type',
        'email',
        'whats_phone',
        'white_paper_en',
        'white_paper_ar',
        'facebook',
        'twitter',
        'telegram',
        'phones',
    ];

    public  const create_update_rules = [

        'type' => 'required',
    ];


}

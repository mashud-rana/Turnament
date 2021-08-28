<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turnament extends Model
{
    use HasFactory;

    protected $fillable=
            ['full_name',
            'email',
            'address',
            'status',
            'winner'
            ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
    ];
}

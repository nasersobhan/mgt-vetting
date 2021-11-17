<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class updates extends Model
{
    use HasFactory;
    protected $softDelete = true;
    protected $fillable = [
        'desciption',
        'title', 'uid', 'pid'
    ];
}

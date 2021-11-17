<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $softDelete = true;
    protected $tableName = 'categories';
    protected $fillable = [
        'name',
        'type',
        'userTypeAccess',
        'parent',
        'userID',
    ];

    public function getByType($type){
        return 0;
    }
}

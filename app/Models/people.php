<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;
class people extends Model
{
    use HasFactory;
    protected $softDelete = true;
    protected $tableName = 'people';
    protected $fillable = [
        "arrivalDate" ,
        "fullname",
        "familyGroup",
        "dateofbirth",
        "block",
        "cluster",
        "floor",
        "room",
        "email",
        "phone",
        "passportNumber",
        "tazkiraNumber",
        "marriageCertificate",
        "uid", "city"
    ];


    public function getCluster()
    {
        return $this->hasOne(categories::class, 'id', 'cluster');
    }
    public function getCity()
    {
        return $this->hasOne(categories::class, 'id', 'city');
    }
    public function getBlock()
    {
        return $this->hasOne(categories::class, 'id', 'block');
    }
    
}

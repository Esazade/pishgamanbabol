<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactinfo extends Model
{
    use HasFactory;
    protected $table='contactinfo';
    protected $primaryKey='id';
    protected $fillable=['phone','mobile','email','address','googlemap','insta','whatsapp','telegram','igap','eita'];
}

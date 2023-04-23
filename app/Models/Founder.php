<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;
    protected $table='founders';
    protected $primaryKey='id';
    protected $fillable=['title','image','description','status'];
}

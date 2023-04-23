<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    use HasFactory;
    protected $table='dialogues';
    protected $primaryKey='id';
    protected $fillable=['title','description','status'];
}

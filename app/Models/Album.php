<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table='albums';
    protected $primaryKey='id';
    protected $fillable=['title','image','description','status'];

    public function photos()
    {
        return $this->hasMany(Photo::class,'album_id','id');
    }
}

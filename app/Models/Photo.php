<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table='photos';
    protected $primaryKey='id';
    protected $fillable=['album_id','title','image','description','status'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}

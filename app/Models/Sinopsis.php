<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelicula;
class Sinopsis extends Model
{
    use HasFactory;
    protected $table = 'sinopsis';
    protected $primary_key = 'id_sinopsis';
    protected $fillable = ['id_sinposis','descripcion'];

    public function pelicula() {
        return $this->hasOne(Pelicula::class,'id_sinopsis','id_sinopsis');

    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;

class Pelicula extends Model
{
    use HasFactory;
    protected $table = 'peliculas';
    protected $primary_key = 'codigo_pelicula';
    protected $fillable = [
        'codigo_pelicula', 'titulo', 'año', 'duracion','codigo_genero'];


    public function prestamos(){
        return $this->hasMany(Prestamo::class,'codigo_pelicula','codigo_pelicula');
    }

    public function Generos(){
        return $this->belongsto(Genero::class,'codigo_genero','codigo_genero');
    }
    public function Sinopsis(){
        return $this->hasOne(Sinposis::class,'id_sinopsis','id_sinopsis');

    }

}

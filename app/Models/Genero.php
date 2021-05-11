<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelicula;

class Genero extends Model
{
    use HasFactory;
    protected $table = 'generos';
    protected $primary_key = 'codigo_genero';

    public function peliculas(){
        return $this->hasMany(Pelicula::class,'codigo_genero','codigo_genero');
    }
    
 
}


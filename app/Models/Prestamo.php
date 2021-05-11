<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
    protected $primary_key = 'num_alquiler';
    protected $fillable = [
        'num_alquiler', 'fecha_alquiler', 'codigo_persona', 'codigo_pelicula'];
}

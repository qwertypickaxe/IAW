<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primary_key = 'codigo_persona';
    protected $fillable = [
        'codigo_persona', 'nombre', 'apellido', 'telefono', 'direccion'];

    public function prestamos(){
        return $this->hasMany(Prestamo::class,'codigo_persona','codigo_persona');
    }
 
    

}

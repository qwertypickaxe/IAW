<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'usuarios';
    protected $primary_key = 'id';
    protected $fillable = [
        'id', 'usuario', 'password','nombre','email','rol','img'];
    public $timestamps = false;
    
    public function persona(){
        return $this->hasOne(persona::class, 'id','id');
    }
}


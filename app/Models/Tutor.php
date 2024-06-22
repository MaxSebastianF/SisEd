<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $table = 'tutor';
    protected $primaryKey = 'id_tutor';

    protected $fillable = [
        'nombre', 
        'apellido', 
        'email', 
        'telefono'
    ];

    public function tutores()
    {
        return $this->hasMany(Tutor::class, 'id_tutor');
    }
}

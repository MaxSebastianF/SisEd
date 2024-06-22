<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso'; // Nombre de la tabla en singular, revisar si es correcto
    protected $primaryKey = 'id_curso'; // Llave primaria

    protected $fillable = ['curso', 'paralelo']; // Atributos asignables en masa

    // Asumiendo que no hay una relación de uno a muchos con la misma tabla
    // Si necesitas definir una relación, asegúrate de que sea correcta.

    // Si existe una relación con otra tabla, podrías definirla así:
    // public function someRelation()
    // {
    //     return $this->hasMany(OtherModel::class, 'foreign_key', 'local_key');
    // }
}
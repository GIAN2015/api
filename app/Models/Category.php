<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name', // Aquí puedes añadir más campos si los tienes en la migración
    ];
    public function products()
{
    return $this->hasMany(Product::class);
}

}

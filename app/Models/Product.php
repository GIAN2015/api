<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = ['name', 'price', 'image', 'category_id'];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // // Relación con las etiquetas (tags)
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    // }
}

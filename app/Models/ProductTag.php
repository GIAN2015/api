<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    // Si no necesitas campos adicionales en la tabla intermedia,
    // puedes omitir la propiedad $fillable, y Laravel la gestionará automáticamente.

    protected $table = 'product_tag';  // Si tu tabla intermedia no sigue la convención de nombres (productos_tags)
    
    // Si necesitas campos adicionales, defínelos aquí
    protected $fillable = [
        'product_id', 'tag_id',
    ];
}

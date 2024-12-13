<?php

// Database\Migrations\2024_12_13_123456_add_category_id_to_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable(); // Agregar la columna category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // Definir la clave foránea
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Eliminar la relación foránea
            $table->dropColumn('category_id'); // Eliminar la columna category_id
        });
    }
}

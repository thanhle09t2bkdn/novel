<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->index('name');
            $table->index('image');
            $table->index('slug');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_name_index');
            $table->dropIndex('categories_item_total_index');
            $table->dropIndex('categories_image_index');
            $table->dropIndex('categories_slug_index');
            $table->dropIndex('categories_created_at_index');
            $table->dropIndex('categories_updated_at_index');
        });
    }
}

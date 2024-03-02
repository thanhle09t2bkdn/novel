<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->index('name');
            $table->index('type');
            $table->index('slug');
            $table->index('image');
            $table->index('storage_link');
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_name_index');
            $table->dropIndex('posts_type_index');
            $table->dropIndex('posts_slug_index');
            $table->dropIndex('posts_image_index');
            $table->dropIndex('posts_storage_link_index');
            $table->dropIndex('posts_created_at_index');
            $table->dropIndex('posts_updated_at_index');
        });
    }
}

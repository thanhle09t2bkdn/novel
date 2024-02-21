<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->string('name');
            $table->unsignedTinyInteger('type')->default(1);
            $table->string('slug');
            $table->unsignedBigInteger('view_number')->default(0);
            $table->unsignedBigInteger('item_total')->default(0);
            $table->string('image');
            $table->string('link')->nullable();
            $table->string('storage_link')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

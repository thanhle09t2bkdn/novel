<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->index('name');
            $table->index('slug');
            $table->index('view_number');
            $table->index('link');
            $table->index('video_link');
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
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropIndex('chapters_name_index');
            $table->dropIndex('chapters_slug_index');
            $table->dropIndex('chapters_view_number_index');
            $table->dropIndex('chapters_link_index');
            $table->dropIndex('chapters_video_link_index');
            $table->dropIndex('chapters_created_at_index');
            $table->dropIndex('chapters_updated_at_index');
        });
    }
}

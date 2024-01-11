<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('name');
            $table->index('email_verified_at');
            $table->index('password');
            $table->index('role');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_name_index');
            $table->dropIndex('users_email_verified_at_index');
            $table->dropIndex('users_password_index');
            $table->dropIndex('users_role_index');
            $table->dropIndex('users_created_at_index');
            $table->dropIndex('users_updated_at_index');
        });
    }
}

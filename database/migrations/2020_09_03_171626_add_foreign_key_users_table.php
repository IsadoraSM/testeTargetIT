<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->integer('profile_id')->unsigned()->after('password');
            $table->integer('sector_id')->unsigned()->after('profile_id');
            $table->foreign('profile_id')
                    ->references('id')->on('profiles')
                    ->onDelete('cascade');
            $table->foreign('sector_id')
                    ->references('id')->on('sectors')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropForeign('users_profile_id_foreign');
            $table->dropForeign('users_sector_id_foreign');
            $table->dropColumn('profile_id');
            $table->dropColumn('sector_id');
        });
    }
}

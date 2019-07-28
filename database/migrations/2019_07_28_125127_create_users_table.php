<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->string('email')->unique();
            $table->string('nom');
            $table->string('prenom');
			$table->boolean('actif')->default(false);
           
			
			//foreign id of groups
			$table->integer('group_id')->unsigned();
			$table->foreign('group_id')
				  ->references('id')
				  ->on('groups')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
			
            $table->rememberToken();
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
			Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_groups_id_foreign');
			
		});
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUsersTable.
 */
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
            // People Data
            $table->increments('id');
            $table->char('cpf', 11)->unique();
            $table->string('name', 50);
            $table->char('phone', 11);
            $table->date('birth')->nullalbe();
            $table->char('gender', 1)->nullalbe();
            $table->text('notes')->nullalbe();

            // Auth Data
            $table->string('email', 80)->unique();
            $table->string('password', 254)->nullalbe();

            // Permission Data
            $table->string('status')->default('active');
            $table->string('permision')->default('app.user');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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

        });
        Schema::drop('users');
    }
}

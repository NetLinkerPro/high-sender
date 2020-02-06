<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;

class CreateHighSenderSmtpAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('high_sender_smtp_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('owner_uuid', 36)->index();
            $table->string('uuid', 36)->index();

            $table->string('name');
            $table->string('host');
            $table->integer('port');
            $table->string('username');
            $table->string('password');
            $table->string('encryption')->nullable();
            $table->string('from_name');
            $table->string('from_address');

            $table->softDeletes();
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
        Schema::dropIfExists('high_sender_smtp_accounts');
    }
}

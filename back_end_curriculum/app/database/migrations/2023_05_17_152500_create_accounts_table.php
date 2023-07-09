<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('accounts')) {
            Schema::create('accounts', function (Blueprint $table) {
                $table->id(); // unsigned、NOT NULL、AUTO_INCREMENT、PK
                $table->string('name', 255)->nullable(false); // NOT NULL
                $table->string('password', 255)->nullable(false); // NOT NULL
                $table->string('email', 225)->nullable(false)->unique(); // NOT NULL、UQ
                $table->string('tel', 20)->nullable(); // NULL
                $table->integer('role')->nullable(false); // NOT NULL
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};

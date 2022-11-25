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
        Schema::create('makes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('slug', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('route', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('component', 255)->nullable();
            $table->string('component_name', 255)->nullable();
            $table->string('view', 255)->default('makes')->nullable();
            $table->text('description')->nullable();
            $table->integer('ordering')->nullable()->default('0');                       
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
        Schema::dropIfExists('makes');
    }
};

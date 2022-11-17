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
        Schema::create('make_field_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('slug', 255)->nullable();          
            $table->string('view', 255)->default('text')->nullable();
            $table->text('description')->nullable();
            $table->integer('ordering')->nullable()->default('0');                    
            if (Schema::hasTable('statuses')) {           
                $table->foreignUuid('status_id')->nullable()->constrained('statuses')->cascadeOnDelete();
            }
            else{
                $table->enum('status_id',['draft','published'])->nullable()->comment("Situação")->default('published');
            }
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();        
            $table->timestamps();
            $table->softDeletes(); 
        });
        Schema::table('make_fields', function (Blueprint $table) {
            $table->foreignUuid('make_field_type_id')->nullable()->constrained('make_field_types')->cascadeOnDelete();        
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('make_field_types');
    }
};

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
        Schema::create('make_field_fks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('make_model_id')->nullable()->constrained('makes')->cascadeOnDelete();        
            $table->foreignUuid('make_field_foreign_key_id')->nullable()->constrained('make_fields')->cascadeOnDelete();        
            $table->foreignUuid('make_field_local_key_id')->nullable()->constrained('make_fields')->cascadeOnDelete();        
            $table->foreignUuid('make_id')->nullable()->constrained('makes')->cascadeOnDelete();        
			$table->enum('foreign_type', array('hasOne','hasMany','belongsTo','belongsToMany'))->default('belongsTo');     
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
        Schema::dropIfExists('make_field_fks');
    }
};

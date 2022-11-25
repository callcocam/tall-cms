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
        Schema::create('make_fields', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('column_name', 100);
            $table->string('column_type', 100)->default('text');
            $table->string('column_width', 50)->default('12');
            $table->boolean('column_visible')->nullable()->default(1);
            $table->text('description')->nullable();
            $table->integer('ordering')->nullable()->default('0');                    
            $table->foreignUuid('make_id')->nullable()->constrained('makes')->cascadeOnDelete();        
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
        Schema::dropIfExists('make_fields');
    }
};

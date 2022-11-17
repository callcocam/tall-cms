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
            if (Schema::hasTable('statuses')) {           
                $table->foreignUuid('status_id')->nullable()->constrained('statuses')->cascadeOnDelete();
            }
            else{
                $table->enum('status_id',['draft','published'])->nullable()->comment("Situação")->default('published');
            }
            $table->foreignUuid('make_id')->nullable()->constrained('makes')->cascadeOnDelete();        
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();        
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

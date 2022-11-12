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
        Schema::create('make_post_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name', 255);
            $table->text('slug', 255)->nullable();
            $table->integer('ordering')->nullable()->default('0');
            $table->foreignUuid('make_field_id')->nullable()->constrained('make_fields')->cascadeOnDelete();        
            $table->foreignUuid('make_post_id')->nullable()->constrained('make_posts')->cascadeOnDelete();        
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();        
            $table->foreignUuid('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();        
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
        Schema::dropIfExists('make_post_items');
    }
};

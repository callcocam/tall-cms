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
        Schema::table('makes', function (Blueprint $table) {
            $table->integer('genarate_content')->nullable()->default('0');                    
            $table->integer('genarate_author')->nullable()->default('0');                
            $table->integer('genarate_timestamps')->nullable()->default('0');                
            $table->integer('genarate_status')->nullable()->default('0');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('makes', function (Blueprint $table) {
           $table->dropColumn('genarate_content');
           $table->dropColumn('genarate_author');
           $table->dropColumn('genarate_timestamps');
           $table->dropColumn('genarate_status');
        });
    }
};

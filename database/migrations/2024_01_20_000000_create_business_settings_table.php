<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            // General settings
            $table->string('light_logo')->nullable()->comment('Path to logo for light mode');
            $table->string('dark_logo')->nullable()->comment('Path to logo for dark mode');
            $table->string('favicon')->nullable()->comment('Path to website favicon');
            $table->string('business_name');
            $table->string('business_email');
            $table->string('business_phone')->nullable();
            $table->text('business_address')->nullable();
            
            // Localization settings
            $table->string('timezone');
            $table->string('date_format');
            $table->string('currency_symbol', 10);
            $table->string('default_language');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_settings');
    }
};
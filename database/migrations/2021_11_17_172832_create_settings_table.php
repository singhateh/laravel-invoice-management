<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_email')->unique()->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_address_1')->nullable();
            $table->string('company_address_2')->nullable();
            $table->string('company_address_3')->nullable();
            $table->string('company_country')->nullable();
            $table->string('company_postcode')->nullable();
            $table->string('currency')->nullable();
            $table->string('enable_tax')->default('true');
            $table->string('include_tax')->default('false');
            $table->string('tax_rate')->nullable();
            $table->string('invoice_prefix')->default('INV');
            $table->string('invoice_initial_value')->default(1);
            $table->string('invoice_theme')->default('#222222');
            $table->string('company_logo')->nullable();
            $table->string('company_logo_width')->default(300);
            $table->string('company_logo_height')->default(90);
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
        Schema::dropIfExists('settings');
    }
}

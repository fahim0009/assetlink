<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_id',191)->nullable();
            $table->string('company_id',191)->nullable();
            $table->string('name',191)->nullable();
            $table->string('category',191)->nullable();
            $table->string('image',191)->nullable();
            $table->longText('description')->nullable();
            $table->string('manufacturer',191)->nullable();
            $table->string('model',191)->nullable();
            $table->string('brand',191)->nullable();
            $table->string('vendor',191)->nullable();
            $table->string('serial_no',191)->nullable();
            $table->tinyInteger('warranty')->default('0')->nullable();
            $table->longText('notes')->nullable();
            $table->string('asset_manager',191)->nullable();
            $table->string('department',191)->nullable();
            $table->string('location',191)->nullable();
            $table->string('checkout',191)->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('assets');
    }
}

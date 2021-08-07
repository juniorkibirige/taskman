<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnboardingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onboarding', function (Blueprint $table) {
            $table->id();
            $table->string('app_id', 20)->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->boolean('status')->default(false);
            $table->unique(['app_id', 'user_id'], "onboarding_unique_index");
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
        Schema::dropIfExists('onboarding');
    }
}

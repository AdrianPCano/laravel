<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('events', function (Blueprint $table) {
      $table->id();
      $table->foreignId('town_id')->unsigned()->index()->nullable();
      $table->string('name');
      $table->string('address')->nullable()->default('Online');
      $table->decimal('price', 8, 2)->nullable()->default(0);
      $table->date('start_date');
      $table->date('end_date');
      $table->time('start_time');
      $table->time('end_time');
      $table->timestamps();
      $table->softDeletes();
        
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('events');
  }
};

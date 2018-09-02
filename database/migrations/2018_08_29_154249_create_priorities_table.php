<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->string('name'); 
            $table->string('color', 7)->default('#000000');
            $table->string('type');
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraints 
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
}

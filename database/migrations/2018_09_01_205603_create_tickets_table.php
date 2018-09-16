<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTicketsTable
 */
class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('assigned_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable(); 
            $table->integer('priority_id')->unsigned()->nullable();
            $table->integer('creator_id')->unsigned()->nullable();
            $table->boolean('is_open')->default(1);
            $table->string('title');
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraints 
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('set null'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('assigned_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
}

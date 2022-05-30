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
        Schema::create('tbl_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->date('start_at');
            $table->date('deadline_at');
            $table->integer('category_id');
            $table->string('notes',255)->nullable();
            $table->string('created_by',50)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tugas');
    }
};

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
        Schema::create('tbl_tugas_exec', function (Blueprint $table) {
            $table->id();
            $table->integer('tugas_id');
            $table->string('username',50);//user_id
            $table->string('status', 50);
            $table->string('evidence',255);
            $table->string('notes',255)->nullable();
            $table->string('update_by', 50)->nullable();
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
        Schema::dropIfExists('tbl_tugas_exec');
    }
};

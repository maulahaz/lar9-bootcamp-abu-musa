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
        Schema::create('tbl_materi', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->date('posted_dt');
            $table->string('category',50);
            $table->longText('content');
            $table->string('slug',255);
            $table->string('author',50);
            $table->string('video_url',255);
            $table->string('status',50);
            $table->string('notes',255)->nullable();
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
        Schema::dropIfExists('tbl_materi');
    }
};

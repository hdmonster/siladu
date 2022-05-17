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
        Schema::create('report_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('report_uuid');
            $table->foreignId('admin_id');
            $table->timestamps();
            
            $table->foreign('report_uuid')
                ->references('uuid')
                ->on('reports')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
                $table->foreign('admin_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_status_histories');
    }
};

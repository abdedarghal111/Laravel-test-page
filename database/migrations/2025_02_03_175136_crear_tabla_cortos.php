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
        Schema::create('cortos', function (Blueprint $table) {
            $table->id();
            $table->string("titulo", 100)->nullable(false);
            $table->text("sinopsis")->nullable(false);
            $table->unsignedBigInteger("director_id")->nullable(false);
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->timestamp("created_at")->nullable(true);
            $table->timestamp("updated_at")->nullable(true);
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('director_id')
                ->references('id')
                ->on('directores')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortos');
    }
};

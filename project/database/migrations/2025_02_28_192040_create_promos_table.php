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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('code', length: 20)->unique()->comment('Промокод');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('apply_at')->nullable()->comment('Время активации');
            $table->boolean('active')->default(0)->comment('Статус активации');
            $table->integer('quantity')->nullable()->comment('Количество активаций');
            $table->integer('employed')->nullable()->comment('Количество активированных');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('promos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['promo_id']);
            $table->dropColumn('promo_id');
        });
        Schema::dropIfExists('promos');
    }
};

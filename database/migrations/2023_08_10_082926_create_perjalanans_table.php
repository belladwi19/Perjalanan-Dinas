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
        Schema::create('perjalanans', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->date('tanggalberangkat');
            $table->date('tanggalpulang');
            $table->string('kotaasal');
            $table->string('kotatujuan');
            $table->double('durasi');
            $table->integer('id_user')->index();
            $table->integer('is_user');
            $table->string('Status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanans');
    }
};

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
        Schema::table('comments', function (Blueprint $table) {
            //creo una colonna image_id di tipo intero molto grande associata all'id della tabella image
            $table->unsignedBigInteger('image_id')->nullable()->after('id');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // elimino tutti i record collegati alla foreign key
            $table->dropForeign('comments_image_id_foreign');
            $table->dropColumn('image_id');
        });
    }
};

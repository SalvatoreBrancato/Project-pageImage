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
        Schema::create('image_tag', function (Blueprint $table) {
            //creazione colonna image_id dalla tabaella image 
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images')->cascadeOnDelete();
            //creazione colonna tag_id dalla tabella tags
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
            //specifica della primaryKey
            $table->primary([
                'image_id',
                'tag_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_tag');
    }
};

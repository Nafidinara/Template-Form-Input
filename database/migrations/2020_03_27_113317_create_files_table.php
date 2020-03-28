<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('file_id');
            $table->string('s_permohonan')->default(null);
            $table->string('s_rekomendasi')->default(null);
            $table->string('s_permohonan')->default(null);
            $table->string('bts_wilayah')->default(null);
            $table->string('jml_penduduk')->default(null);
            $table->string('pw_distrik')->default(null);
            $table->string('pw_kampung')->default(null);
            $table->string('ft_kantor')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}

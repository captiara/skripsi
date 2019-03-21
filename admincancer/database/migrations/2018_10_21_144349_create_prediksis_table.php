<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrediksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediksis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pasiens_id')->unsigned();
            $table->foreign('pasiens_id')->references('id')->on('pasiens');
            $table->boolean('status_nikah');
            $table->integer('umur');
            $table->boolean('status_pil');
            $table->boolean('pernah_pil');
            $table->boolean('pernah_suntik');
            $table->boolean('pernah_susuk');
            $table->boolean('pernah_iud');
            $table->boolean('pernah_kontra');
            $table->boolean('sekarang_pil');
            $table->boolean('sekarang_suntik');
            $table->boolean('sekarang_susuk');
            $table->boolean('sekarang_iud');
            $table->boolean('sekarang_kontra');
            $table->integer('jml_anaklk');
            $table->integer('jml_anakpr');
            $table->integer('jml_anak_mnggl');
            $table->boolean('status_meno');
            $table->boolean('status_mens');
            $table->integer('usia_mens_1');
            $table->integer('usia_meno');
            $table->integer('usia_lahir_anak1');
            $table->integer('lama_asi_anak1');
            $table->integer('lama_asi_anak2');
            $table->integer('lama_asi_anak3');
            $table->integer('jml_gugur');
            $table->boolean('tanpa_keluh');
            $table->integer('lama_keluhan');
            $table->boolean('keluhan_ptng_kdlm');
            $table->boolean('keluhan_keluar_cairan');
            $table->boolean('keluhan_kulit_pyd');
            $table->boolean('keluhan_lain_pyd');
            $table->boolean('ada_benjolan');
            $table->boolean('klg_kanker');
            $table->boolean('keluhan_bb_turun');
            $table->boolean('tiroid_berbedar');
            $table->boolean('keluhan_lain_tiroid');
            $table->boolean('benjolan_tiroid');
            $table->integer('lama_keluhan_lain');
            $table->boolean('benjol_organ_lain');
            $table->boolean('keluhan_rs_skt');
            $table->boolean('keluhan_lain');
            $table->boolean('pnykt_lain_mr3');
            $table->boolean('pnykt_pyd');
            $table->boolean('derita_pyd');
            $table->boolean('terapi_hormon');
            $table->integer('thn_kemo_pyd');
            $table->boolean('pakai_obat_lain');
            $table->boolean('pakai_radioterapi');
            $table->boolean('terapi_lain');
            $table->boolean('hipertensi');
            $table->boolean('obat_hipertensi');
            $table->boolean('kencing_mns');
            $table->boolean('obat_kencing_mns');
            $table->boolean('asma');
            $table->boolean('obat_asma');
            $table->boolean('alergi_obat');
            $table->boolean('penyakit_lain');
            $table->boolean('penyakit_pd_klg');
            $table->boolean('kencing_mns_klg');
            $table->boolean('asma_pd_klg');
            $table->boolean('alergi_klg');
            $table->boolean('penyakit_lain_klg');
            $table->boolean('is_usg');
            $table->boolean('is_mammo');
            $table->boolean('is_vc');
            $table->boolean('is_hpa');
            $table->boolean('is_ihc');
            $table->boolean('is_ioc');
            $table->boolean('is_sito');
            $table->boolean('is_fna');
         
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prediksis');
    }
}

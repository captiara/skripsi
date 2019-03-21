<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrediksikuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediksiku', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pasiens_id')->unsigned();
            $table->foreign('pasiens_id')->references('id')->on('pasiens');
            $table->boolean('STATUS_NIKAH_PASIEN');
            $table->integer('umur');
            $table->boolean('Pernah_Menggunakan_Pil');
            $table->boolean('Pernah_Menggunakan_Suntik');
            $table->boolean('Pernah_Menggunakan_Susuk');
            $table->boolean('Pernah_Menggunakan_IUD');
            $table->boolean('Pernah_Menggunakan_Kontrasepsi_Lain');
            $table->boolean('Sekarang_Menggunakan_Pil');
            $table->boolean('Sekarang_Menggunakan_Suntik');
            $table->boolean('Sekarang_Menggunakan_Susuk');
            $table->boolean('Sekarang_Menggunakan_IUD');
            $table->boolean('Sekarang_Menggunakan_Kontrasepsi_Lain');
            $table->integer('Jumlah_Anak_LK');
            $table->integer('Jml_Anak_Pr');
            $table->integer('Jml_Anak_Meninggal');
            $table->boolean('Status_Hormonal_');
            $table->integer('Usia_Menstruasi_Pertama_Kali');
            $table->boolean('Status_mens');
            $table->integer('Usia_menopause');
            $table->integer('Usia_melahirkan_anak_pertama');
            $table->integer('Lama_menyusui_anak1');
            $table->integer('Lama_menyusui_anak2');
            $table->integer('Lama_menyusui_anak3');
            $table->integer('Jumlah_berapa_kali_keguguran');
            $table->boolean('Pasien_tanpa_keluhan');
            $table->integer('Lama_keluhan_yg_dirasakan_di_payudara');
            $table->boolean('Keluhan_puting_susu_tertarik_kedlm');
            $table->boolean('Keluhan_payudara_keluar_cairan');
            $table->boolean('Keluhan_perubahan_pada_kulit_payudara');
            $table->boolean('Keluhan_lain_di_payudara');
            $table->boolean('Terdapat_benjolan_pada_payudara');
            $table->boolean('Memiliki_keluarga_dengan_kanker');
            $table->boolean('Keluhan_brt_badan_turun');
            $table->boolean('Tiroid_berdebar_mr3');
            $table->boolean('Keluhan_lain_pada_tiroid');
            $table->boolean('Terdapat_benjolan_pada_tiroid');
            $table->integer('Lama_keluhan_lain');
            $table->boolean('Benjolan_pd_organ_lain');
            $table->boolean('Keluhan_rasa_sakit');
            $table->boolean('Keluhan_lain');
            $table->boolean('Menderita_penyakit_lain_lain_pada_mr3');
            $table->boolean('Menderita_penyakit_di_payudara');
            $table->boolean('Terapi_hormonal_u_penyakit_di_payudara');
            $table->integer('Thn_kemoterapi_u_penyakit_di_payudara');
            $table->boolean('Penggunaan_obat_lainnya');
            $table->boolean('Riwayat_penggunaan_radioterapi');
            $table->boolean('Terapi_lainnya');
            $table->boolean('Pasien_menderita_hipertensi');
            $table->boolean('Mendapatkan_pengobatan_u_hypertensi');
            $table->boolean('Pasien_menderita_kencing_manis');
            $table->boolean('Mendapatkan_pengobatan_untuk_kencing_manis');
            $table->boolean('Pasienmenderit_asma');
            $table->boolean('Mendapatkan_pengobatan_asma');
            $table->boolean('Pasien_memiliki_alergi_obat');
            $table->boolean('Pasien_menderita_penyakit_lain');
            $table->boolean('Penyakit_lain_pd_keluarga');
            $table->boolean('Penyakit_hipertensi_pd_keluarga');
            $table->boolean('Penyakit_kencing_manis_pd_keluarga');
            $table->boolean('Penyakit_asma_pada_keluarga');
            $table->boolean('Riwayat_alergi_pd_keluarga');
            $table->boolean('IS_USG');
            $table->boolean('IS_MAMMOGRAPHY');
            $table->boolean('IS_VC');
            $table->boolean('IS_HPA');
            $table->boolean('IS_IHC');
            $table->boolean('IS_IOC');
            $table->boolean('IS_SITOLOGI');
            $table->boolean('IS_FNA');
            $table->string('CLASS');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prediksiku');
    }
}

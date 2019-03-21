<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model

{
    
    protected $table = 'prediksiku';


/**    
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    protected $fillable = ['pasiens_id','STATUS_NIKAH_PASIEN','umur', 'Pernah_Menggunakan_Pil','Pernah_Menggunakan_Suntik','Pernah_Menggunakan_Susuk','Pernah_Menggunakan_IUD','Pernah_Menggunakan_Kontrasepsi_Lain','Sekarang_Menggunakan_Pil','Sekarang_Menggunakan_Suntik','Sekarang_Menggunakan_Susuk','Sekarang_Menggunakan_IUD','Sekarang_Menggunakan_Kontrasepsi_Lain','Jumlah_Anak_LK','Jml_Anak_Pr',
    'Jml_Anak_Meninggal', 'Status_Hormonal_','Usia_Menstruasi_Pertama_Kali','Status_mens','Usia_menopause','Usia_melahirkan_anak_pertama','Lama_menyusui_anak1','Lama_menyusui_anak2','Lama_menyusui_anak3','Jumlah_berapa_kali_keguguran','Pasien_tanpa_keluhan','Lama_keluhan_yg_dirasakan_di_payudara','Keluhan_puting_susu_tertarik_kedlm','Keluhan_payudara_keluar_cairan','Keluhan_perubahan_pada_kulit_payudara','Keluhan_lain_di_payudara','Terdapat_benjolan_pada_payudara',
    'Memiliki_keluarga_dengan_kanker','Keluhan_brt_badan_turun','Tiroid_berdebar_mr3','Keluhan_lain_pada_tiroid','Terdapat_benjolan_pada_tiroid','Lama_keluhan_lain','Benjolan_pd_organ_lain','Keluhan_rasa_sakit','Keluhan_lain','Menderita_penyakit_lain_lain_pada_mr3','Menderita_penyakit_di_payudara','Terapi_hormonal_u_penyakit_di_payudara','Thn_kemoterapi_u_penyakit_di_payudara','Penggunaan_obat_lainnya',
    'Riwayat_penggunaan_radioterapi','Terapi_lainnya','Pasien_menderita_hipertensi','Mendapatkan_pengobatan_u_hypertensi','Pasien_menderita_kencing_manis','Mendapatkan_pengobatan_untuk_kencing_manis','Pasienmenderit_asma','Mendapatkan_pengobatan_asma','Pasien_memiliki_alergi_obat','Pasien_menderita_penyakit_lain','Penyakit_lain_pd_keluarga','Penyakit_hipertensi_pd_keluarga','Penyakit_kencing_manis_pd_keluarga','Penyakit_asma_pada_keluarga','Riwayat_alergi_pd_keluarga',
    'IS_USG','IS_MAMMOGRAPHY','IS_VC','IS_HPA','IS_IHC','IS_IOC','IS_SITOLOGI','IS_FNA','created_at','updated_at'
    ];

}


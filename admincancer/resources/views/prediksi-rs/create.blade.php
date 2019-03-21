@extends('pemeriksaan-rs.base')
@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Perhitungan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('prediksis.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Pasien</label>
                            <div class="col-md-6">
                                <select class="form-control " name="pasiens_id">
                                    <option value="-1">Please select patient name</option>
                                    @foreach ($pasiens as $pasien)
                                        <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
                            <label for="umur" class="col-md-4 control-label">Umur(tahun) </label>
                            <div class="col-md-6">
                                <input id="umur" type="text" class="form-control" name="umur" required>

                                @if ($errors->has('umur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('umur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('STATUS_NIKAH_PASIEN') ? ' has-error' : '' }}">
                            <label for="STATUS_NIKAH_PASIEN" class="col-md-4 control-label"> Apakah sudah menikah? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="STATUS_NIKAH_PASIEN" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="STATUS_NIKAH_PASIEN" value="0">No
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="Pernah_Menggunakan_Pil" class="col-md-4 control-label"> Apakah Pernah menggunakan pil? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Pil" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Pil" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pernah_Menggunakan_Suntik" class="col-md-4 control-label"> Apakah Pernah menggunakan Suntik? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Suntik" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Suntik" value="0">No
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="Pernah_Menggunakan_Susuk" class="col-md-4 control-label"> Apakah Pernah menggunakan Susuk? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Susuk" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Susuk" value="0">No
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Pernah_Menggunakan_IUD" class="col-md-4 control-label"> Apakah Pernah menggunakan IUD? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pernah_Menggunakan_IUD" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pernah_Menggunakan_IUD" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pernah_Menggunakan_Kontrasepsi_Lain" class="col-md-4 control-label"> Apakah Pernah menggunakan kontrasepsi lain? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Kontrasepsi_Lain" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pernah_Menggunakan_Kontrasepsi_Lain" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Sekarang_Menggunakan_Pil" class="col-md-4 control-label"> Apakah Sekarang menggunakan Pil? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Pil" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Pil" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Sekarang_Menggunakan_Suntik" class="col-md-4 control-label"> Apakah Sekarang menggunakan Suntik? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Suntik" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Suntik" value="0">No
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="Sekarang_Menggunakan_Susuk" class="col-md-4 control-label"> Apakah Sekarang menggunakan Susuk? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Susuk" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Susuk" value="0">No
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="Sekarang_Menggunakan_IUD" class="col-md-4 control-label"> Apakah Sekarang menggunakan IUD? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_IUD" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_IUD" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Sekarang_Menggunakan_Kontrasepsi_Lain" class="col-md-4 control-label"> Apakah Sekarang menggunakan Kontrasepsi Lain? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Kontrasepsi_Lain" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Sekarang_Menggunakan_Kontrasepsi_Lain" value="0">No
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Jumlah_Anak_LK') ? ' has-error' : '' }}">
                            <label for="Jumlah_Anak_LK" class="col-md-4 control-label">Berapa Jumlah Anak Laki-laki? </label>
                            <div class="col-md-6">
                                <input id="Jumlah_Anak_LK" type="text" class="form-control" name="Jumlah_Anak_LK" required>

                                @if ($errors->has('jml_anaklk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Jumlah_Anak_LK') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('Jml_Anak_Pr') ? ' has-error' : '' }}">
                            <label for="Jml_Anak_Pr" class="col-md-4 control-label">Berapa Jumlah Anak Perempuan? </label>
                            <div class="col-md-6">
                                <input id="Jml_Anak_Pr" type="text" class="form-control" name="Jml_Anak_Pr" required>

                                @if ($errors->has('Jml_Anak_Pr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Jml_Anak_Pr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Jml_Anak_Meninggal') ? ' has-error' : '' }}">
                            <label for="Jml_Anak_Meninggal" class="col-md-4 control-label">Berapa Jumlah Anak yg Meninggal? </label>
                            <div class="col-md-6">
                                <input id="jml_anak_mnggl" type="text" class="form-control" name="Jml_Anak_Meninggal" required>

                                @if ($errors->has('Jml_Anak_Meninggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Jml_Anak_Meninggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Status_Hormonal_" class="col-md-4 control-label"> Apakah Status Hormonal Menopause? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Status_Hormonal_" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Status_Hormonal_" value="0">No
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Usia_Menstruasi_Pertama_Kali') ? ' has-error' : '' }}">
                            <label for="Usia_Menstruasi_Pertama_Kali" class="col-md-4 control-label">Berapa Usia Menstruasi Pertama? (tahun) </label>
                            <div class="col-md-6">
                            <!-- tir iki seng nggarahi error, seng di nggo iku name guduk id (conto e iki name="Usia_Menstruasi_Pertama_Kali") -->
                                <input id="Usia_Menstruasi_Pertama_Kali" type="text" class="form-control" name="Usia_Menstruasi_Pertama_Kali" required>

                                @if ($errors->has('Usia_Menstruasi_Pertama_Kali'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Usia_Menstruasi_Pertama_Kali') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Status_mens" class="col-md-4 control-label"> Status Menstruasi? </label>

                            <div class="col-md-6">
                            
                            <input type="radio" class="flat" name="Status_mens" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Status_mens" value="0">No
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('Usia_menopause') ? ' has-error' : '' }}">
                            <label for="Usia_menopause" class="col-md-4 control-label">Berapa Usia Menopause? </label>
                            <div class="col-md-6">
                                <input id="Usia_menopause" type="text" class="form-control" name="Usia_menopause" required>

                                @if ($errors->has('Usia_menopause'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Usia_menopause') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Usia_melahirkan_anak_pertama') ? ' has-error' : '' }}">
                            <label for="Usia_melahirkan_anak_pertama" class="col-md-4 control-label">Berapa Usia Lahir Anak Pertama?(tahun)</label>
                            <div class="col-md-6">
                                <input id="Usia_melahirkan_anak_pertama" type="text" class="form-control" name="Usia_melahirkan_anak_pertama" required>

                                @if ($errors->has('Usia_melahirkan_anak_pertama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Usia_melahirkan_anak_pertama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Lama_menyusui_anak1') ? ' has-error' : '' }}">
                            <label for="Lama_menyusui_anak1" class="col-md-4 control-label">Berapa Usia Asi Anak Pertama? </label>
                            <div class="col-md-6">
                                <input id="Lama_menyusui_anak1" type="text" class="form-control" name="Lama_menyusui_anak1" required>

                                @if ($errors->has('Lama_menyusui_anak1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Lama_menyusui_anak1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Lama_menyusui_anak2') ? ' has-error' : '' }}">
                            <label for="Lama_menyusui_anak2" class="col-md-4 control-label">Berapa Usia Asi Anak Kedua? </label>
                            <div class="col-md-6">
                                <input id="lama_asi_anak2" type="text" class="form-control" name="Lama_menyusui_anak2" required>

                                @if ($errors->has('Lama_menyusui_anak2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Lama_menyusui_anak2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Lama_menyusui_anak3') ? ' has-error' : '' }}">
                            <label for="Lama_menyusui_anak3" class="col-md-4 control-label">Berapa Usia Asi Anak Ketiga? </label>
                            <div class="col-md-6">
                                <input id="Lama_menyusui_anak3" type="text" class="form-control" name="Lama_menyusui_anak3" required>

                                @if ($errors->has('Lama_menyusui_anak3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Lama_menyusui_anak3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Jumlah_berapa_kali_keguguran') ? ' has-error' : '' }}">
                            <label for="Jumlah_berapa_kali_keguguran" class="col-md-4 control-label">Berapa Kali Keguguran? </label>
                            <div class="col-md-6">
                                <input id="Jumlah_berapa_kali_keguguran" type="text" class="form-control" name="Jumlah_berapa_kali_keguguran" required>

                                @if ($errors->has('Jumlah_berapa_kali_keguguran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Jumlah_berapa_kali_keguguran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pasien_tanpa_keluhan" class="col-md-4 control-label"> Apakah Pasien Ada Keluhan? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasien_tanpa_keluhan" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasien_tanpa_keluhan" value="0">No
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Lama_keluhan_yg_dirasakan_di_payudara') ? ' has-error' : '' }}">
                            <label for="Lama_keluhan_yg_dirasakan_di_payudara" class="col-md-4 control-label">Berapa Lama Keluhan yang dirasakan? (bulan) </label>
                            <div class="col-md-6">
                                <input id="Lama_keluhan_yg_dirasakan_di_payudara" type="text" class="form-control" name="Lama_keluhan_yg_dirasakan_di_payudara" required>

                                @if ($errors->has('Lama_keluhan_yg_dirasakan_di_payudara'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Lama_keluhan_yg_dirasakan_di_payudara') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_puting_susu_tertarik_kedlm" class="col-md-4 control-label"> Ada keluhan puting susu tertarik kedalam? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_puting_susu_tertarik_kedlm" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_puting_susu_tertarik_kedlm" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_payudara_keluar_cairan" class="col-md-4 control-label"> Adakah keluhan payudara keluar cairan? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_payudara_keluar_cairan" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_payudara_keluar_cairan" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_perubahan_pada_kulit_payudara" class="col-md-4 control-label"> Adakah Keluhan Perubahan pada Kulit Payudara? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_perubahan_pada_kulit_payudara" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_perubahan_pada_kulit_payudara" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_lain_di_payudara" class="col-md-4 control-label"> Adakah Keluhan lain pada Payudara? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_lain_di_payudara" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_lain_di_payudara" value="0">No
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="Terdapat_benjolan_pada_payudara" class="col-md-4 control-label"> Apakah ada Benjolan pada Payudara? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Terdapat_benjolan_pada_payudara" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Terdapat_benjolan_pada_payudara" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Memiliki_keluarga_dengan_kanker" class="col-md-4 control-label"> Apakah keluarga yang memiliki Kanker? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Memiliki_keluarga_dengan_kanker" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Memiliki_keluarga_dengan_kanker" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_brt_badan_turun" class="col-md-4 control-label"> Adakah keluhan berat badan turun? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_brt_badan_turun" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_brt_badan_turun" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Tiroid_berdebar_mr3" class="col-md-4 control-label"> Apakah tiroid berdebar? </label>

                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Tiroid_berdebar_mr3" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Tiroid_berdebar_mr3" value="0">No
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="Keluhan_lain_pada_tiroid" class="col-md-4 control-label"> Apakah ada keluhan lain pada tiroid? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_lain_pada_tiroid" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_lain_pada_tiroid" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Terdapat_benjolan_pada_tiroid" class="col-md-4 control-label"> Apakah ada benjolan pada tiroid? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Terdapat_benjolan_pada_tiroid" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Terdapat_benjolan_pada_tiroid" value="0">No
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('Lama_keluhan_lain') ? ' has-error' : '' }}">
                            <label for="Lama_keluhan_lain" class="col-md-4 control-label">Lama keluhan lain </label>
                            <div class="col-md-6">
                                <input id="Lama_keluhan_lain" type="text" class="form-control" name="Lama_keluhan_lain" required>

                                @if ($errors->has('Lama_keluhan_lain'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Lama_keluhan_lain') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Benjolan_pd_organ_lain" class="col-md-4 control-label"> Adakah benjolan pada organ lain? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Benjolan_pd_organ_lain" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Benjolan_pd_organ_lain" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_rasa_sakit" class="col-md-4 control-label"> Adakah keluhan rasa sakit? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_rasa_sakit" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_rasa_sakit" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Keluhan_lain" class="col-md-4 control-label"> Adakah keluhan lain? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Keluhan_lain" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Keluhan_lain" value="0">No
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Menderita_penyakit_lain_lain_pada_mr3" class="col-md-4 control-label"> Apakah menderita penyakit lain pada mr3? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Menderita_penyakit_lain_lain_pada_mr3" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Menderita_penyakit_lain_lain_pada_mr3" value="0">No
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Menderita_penyakit_di_payudara" class="col-md-4 control-label"> Apakah menderita penyakit lain di payudara? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Menderita_penyakit_di_payudara" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Menderita_penyakit_di_payudara" value="0">No
                            </div>
                        </div>

                    

                         <div class="form-group">
                            <label for="Terapi_hormonal_u_penyakit_di_payudara" class="col-md-4 control-label"> Apakah menjalani terapi hormonal dipayudara? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Terapi_hormonal_u_penyakit_di_payudara" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Terapi_hormonal_u_penyakit_di_payudara" value="0">No
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('Thn_kemoterapi_u_penyakit_di_payudara') ? ' has-error' : '' }}">
                            <label for="Thn_kemoterapi_u_penyakit_di_payudara" class="col-md-4 control-label">Tahun menjalani Kemotrapi  </label>
                            <div class="col-md-6">
                                <input id="Thn_kemoterapi_u_penyakit_di_payudara" type="text" class="form-control" name="Thn_kemoterapi_u_penyakit_di_payudara" required>

                                @if ($errors->has('Thn_kemoterapi_u_penyakit_di_payudara'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Thn_kemoterapi_u_penyakit_di_payudara') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="Penggunaan_obat_lainnya" class="col-md-4 control-label"> Apakah ada penggunaan obat lain? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Penggunaan_obat_lainnya" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Penggunaan_obat_lainnya" value="0">No
                            </div>
                        </div>
                        

                          <div class="form-group">
                            <label for="Riwayat_penggunaan_radioterapi" class="col-md-4 control-label"> Adakah riwayat penggunaan radioterapi ? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Riwayat_penggunaan_radioterapi" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Riwayat_penggunaan_radioterapi" value="0">No
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Terapi_lainnya" class="col-md-4 control-label"> Adakah riwayat terapi lainnya? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Terapi_lainnya" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Terapi_lainnya" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pasien_menderita_hipertensi" class="col-md-4 control-label"> Apakah pasien menderita hipertensi? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasien_menderita_hipertensi" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasien_menderita_hipertensi" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Mendapatkan_pengobatan_u_hypertensi" class="col-md-4 control-label"> Apakah mendapatkan pengobatan hipertensi? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_u_hypertensi" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_u_hypertensi" value="0">No
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="Pasien_menderita_kencing_manis" class="col-md-4 control-label"> Apakah pasien menderita kencing manis? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasien_menderita_kencing_manis" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasien_menderita_kencing_manis" value="0">No
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="Mendapatkan_pengobatan_untuk_kencing_manis" class="col-md-4 control-label"> Apakah mendapatkan pengobatan kencing manis? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_untuk_kencing_manis" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_untuk_kencing_manis" value="0">No
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="Pasienmenderit_asma" class="col-md-4 control-label"> Apakah menderita asma? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasienmenderit_asma" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasienmenderit_asma" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Mendapatkan_pengobatan_asma" class="col-md-4 control-label"> Apakah mendapatkan pengobatan asma? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_asma" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Mendapatkan_pengobatan_asma" value="0">No
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="Pasien_memiliki_alergi_obat" class="col-md-4 control-label"> Apakah pasien memiliki alergi obat? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasien_memiliki_alergi_obat" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasien_memiliki_alergi_obat" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pasien_menderita_penyakit_lain" class="col-md-4 control-label"> Apakah pasien menderita penyakit lain? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Pasien_menderita_penyakit_lain" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Pasien_menderita_penyakit_lain" value="0">No
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="Penyakit_lain_pd_keluarga" class="col-md-4 control-label"> Apakah pasien memiliki penyakit lain pada keluarga? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Penyakit_lain_pd_keluarga" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Penyakit_lain_pd_keluarga" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Penyakit_hipertensi_pd_keluarga" class="col-md-4 control-label"> Apakah pasien memiliki penyakit hipertensi pada keluarga? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Penyakit_hipertensi_pd_keluarga" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Penyakit_hipertensi_pd_keluarga" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Penyakit_kencing_manis_pd_keluarga" class="col-md-4 control-label"> Apakah pasien memiliki penyakit kencing manis pada keluarga? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Penyakit_kencing_manis_pd_keluarga" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Penyakit_kencing_manis_pd_keluarga" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Penyakit_asma_pada_keluarga" class="col-md-4 control-label"> Apakah pasien memiliki penyakit asma pada keluarga? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Penyakit_asma_pada_keluarga" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Penyakit_asma_pada_keluarga" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Riwayat_alergi_pd_keluarga" class="col-md-4 control-label"> Apakah pasien memiliki riwayat alergi penyakit pada keluarga? </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="Riwayat_alergi_pd_keluarga" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="Riwayat_alergi_pd_keluarga" value="0">No
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="IS_USG" class="col-md-4 control-label"> Hasil USG </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_USG" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_USG" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_MAMMOGRAPHY" class="col-md-4 control-label"> Hasil Mamografi </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_MAMMOGRAPHY" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_MAMMOGRAPHY" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_VC" class="col-md-4 control-label"> hasil VC </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_VC" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_VC" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_HPA" class="col-md-4 control-label"> Hasil HPA </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_HPA" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_HPA" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_IHC" class="col-md-4 control-label"> Hasil IHC </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_IHC" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_IHC" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_IOC" class="col-md-4 control-label"> Hasil IOC </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_IOC" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_IOC" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_SITOLOGI" class="col-md-4 control-label"> Hasil SITOLOGI</label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_SITOLOGI" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_SITOLOGI" value="0">No
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IS_FNA" class="col-md-4 control-label"> Hasil FNA </label>
                            <div class="col-md-6">
                            <input type="radio" class="flat" name="IS_FNA" value="1"> Yes &nbsp
                            <input type="radio" class="flat" name="IS_FNA" value="0">No
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Prediksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

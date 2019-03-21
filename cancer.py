## backend/app.py
from flask import Flask, jsonify, request
from sklearn import svm
from sklearn import datasets
from sklearn.externals import joblib
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
import json
import pickle 
import numpy as np
from flask import Flask, Response, request
from sklearn.model_selection import train_test_split


import requests


# initialize flask application
app = Flask(__name__)

dframe= pd.read_csv('tesbuku10.csv')
R=dframe[['STATUS_NIKAH_PASIEN','umur','Pernah_Menggunakan_Pil','Pernah_Menggunakan_Suntik','Pernah_Menggunakan_Susuk','Pernah_Menggunakan_IUD','Pernah_Menggunakan_Kontrasepsi_Lain','Sekarang_Menggunakan_Pil','Sekarang_Menggunakan_Suntik','Sekarang_Menggunakan_Susuk','Sekarang_Menggunakan_IUD','Sekarang_Menggunakan_Kontrasepsi_Lain','Jumlah_Anak_LK','Jml_Anak_Pr','Jml_Anak_Meninggal','Status_Hormonal_','Usia_Menstruasi_Pertama_Kali','Status_mens','Usia_menopause','Usia_melahirkan_anak_pertama','Lama_menyusui_anak1','Lama_menyusui_anak2','Lama_menyusui_anak3','Jumlah_berapa_kali_keguguran','Pasien_tanpa_keluhan','Lama_keluhan_yg_dirasakan_di_payudara','Keluhan_puting_susu_tertarik_kedlm','Keluhan_payudara_keluar_cairan','Keluhan_perubahan_pada_kulit_payudara','Keluhan_lain_di_payudara','Terdapat_benjolan_pada_payudara','Memiliki_keluarga_dengan_kanker','Keluhan_brt_badan_turun','Tiroid_berdebar_mr3','Keluhan_lain_pada_tiroid','Terdapat_benjolan_pada_tiroid','Lama_keluhan_lain','Benjolan_pd_organ_lain','Keluhan_rasa_sakit','Keluhan_lain','Menderita_penyakit_lain_lain_pada_mr3','Menderita_penyakit_di_payudara','Terapi_hormonal_u_penyakit_di_payudara','Thn_kemoterapi_u_penyakit_di_payudara','Penggunaan_obat_lainnya','Riwayat_penggunaan_radioterapi','Terapi_lainnya','Pasien_menderita_hipertensi','Mendapatkan_pengobatan_u_hypertensi','Pasien_menderita_kencing_manis','Mendapatkan_pengobatan_untuk_kencing_manis','Pasienmenderit_asma','Mendapatkan_pengobatan_asma','Pasien_memiliki_alergi_obat','Pasien_menderita_penyakit_lain','Penyakit_lain_pd_keluarga','Penyakit_hipertensi_pd_keluarga','Penyakit_kencing_manis_pd_keluarga','Penyakit_asma_pada_keluarga','Riwayat_alergi_pd_keluarga','IS_USG','IS_MAMMOGRAPHY','IS_VC','IS_HPA','IS_IHC','IS_IOC','IS_SITOLOGI','IS_FNA']].values.tolist()
y=dframe['CLASS'].values.tolist()
X_train, X_test, y_train, y_test = train_test_split(R, y, test_size = 0.2, random_state=0)
clf = svm.SVC(kernel='poly')
#clf = svm.SVC(C=1.0,probability=True,random_state=1)
#clf = joblib.load('filename.pkl')
clf.fit(X_train, y_train)
clf_predictions = clf.predict(X_test)
#clf.fit(R, y)
#joblib.dump(clf, 'filename.pkl')
	
@app.route('/api/train', methods=['POST'])
def train():
# get parameters from request
    parameters = request.get_json()
 # read iris data set 
    dframe= pd.read_csv('tesbuku8Biner.csv')
    R=dframe[['STATUS_NIKAH_PASIEN','umur','Pernah_Menggunakan_Pil','Pernah_Menggunakan_Suntik','Pernah_Menggunakan_Susuk','Pernah_Menggunakan_IUD','Pernah_Menggunakan_Kontrasepsi_Lain','Sekarang_Menggunakan_Pil','Sekarang_Menggunakan_Suntik','Sekarang_Menggunakan_Susuk','Sekarang_Menggunakan_IUD','Sekarang_Menggunakan_Kontrasepsi_Lain','Jumlah_Anak_LK','Jml_Anak_Pr','Jml_Anak_Meninggal','Status_Hormonal_','Usia_Menstruasi_Pertama_Kali','Status_mens','Usia_menopause','Usia_melahirkan_anak_pertama','Lama_menyusui_anak1','Lama_menyusui_anak2','Lama_menyusui_anak3','Jumlah_berapa_kali_keguguran','Pasien_tanpa_keluhan','Lama_keluhan_yg_dirasakan_di_payudara','Keluhan_puting_susu_tertarik_kedlm','Keluhan_payudara_keluar_cairan','Keluhan_perubahan_pada_kulit_payudara','Keluhan_lain_di_payudara','Terdapat_benjolan_pada_payudara','Memiliki_keluarga_dengan_kanker','Keluhan_brt_badan_turun','Tiroid_berdebar_mr3','Keluhan_lain_pada_tiroid','Terdapat_benjolan_pada_tiroid','Lama_keluhan_lain','Benjolan_pd_organ_lain','Keluhan_rasa_sakit','Keluhan_lain','Menderita_penyakit_lain_lain_pada_mr3','Menderita_penyakit_di_payudara','Terapi_hormonal_u_penyakit_di_payudara','Thn_kemoterapi_u_penyakit_di_payudara','Penggunaan_obat_lainnya','Riwayat_penggunaan_radioterapi','Terapi_lainnya','Pasien_menderita_hipertensi','Mendapatkan_pengobatan_u_hypertensi','Pasien_menderita_kencing_manis','Mendapatkan_pengobatan_untuk_kencing_manis','Pasienmenderit_asma','Mendapatkan_pengobatan_asma','Pasien_memiliki_alergi_obat','Pasien_menderita_penyakit_lain','Penyakit_lain_pd_keluarga','Penyakit_hipertensi_pd_keluarga','Penyakit_kencing_manis_pd_keluarga','Penyakit_asma_pada_keluarga','Riwayat_alergi_pd_keluarga','IS_USG','IS_MAMMOGRAPHY','IS_VC','IS_HPA','IS_IHC','IS_IOC','IS_SITOLOGI','IS_FNA']].values.tolist()
    y=dframe['CLASS'].values.tolist()
# fit model
    clf = svm.SVC(C=1.0,probability=True,random_state=1)
    clf.fit(X, y)
# persist model
    joblib.dump(clf, 'SVMModel.pckl')
    return jsonify({'accuracy': round(clf.score(R, y) * 100, 2)})

@app.route('/api/predict', methods=['POST'])
def predicts():
    req_body = request.get_json(silent=True)
					
    STATUS_NIKAH_PASIEN = req_body['STATUS_NIKAH_PASIEN']
    umur = req_body['umur']
    Pernah_Menggunakan_Pil= req_body['Pernah_Menggunakan_Pil']
    Pernah_Menggunakan_Suntik= req_body['Pernah_Menggunakan_Suntik']
    Pernah_Menggunakan_Susuk= req_body ['Pernah_Menggunakan_Susuk']
    Pernah_Menggunakan_IUD = req_body ['Pernah_Menggunakan_IUD']
    Pernah_Menggunakan_Kontrasepsi_Lain = req_body['Pernah_Menggunakan_Kontrasepsi_Lain']
    Sekarang_Menggunakan_Pil= req_body['Sekarang_Menggunakan_Pil']
    Sekarang_Menggunakan_Suntik= req_body['Sekarang_Menggunakan_Suntik']
    Sekarang_Menggunakan_Susuk = req_body['Sekarang_Menggunakan_Susuk']
    Sekarang_Menggunakan_IUD= req_body['Sekarang_Menggunakan_IUD']
    Sekarang_Menggunakan_Kontrasepsi_Lain = req_body['Sekarang_Menggunakan_Kontrasepsi_Lain']
    Jumlah_Anak_LK= req_body['Jumlah_Anak_LK']
    Jml_Anak_Pr= req_body['Jml_Anak_Pr']
    Jml_Anak_Meninggal=req_body['Jml_Anak_Meninggal']
    Status_Hormonal_=req_body['Status_Hormonal_']
    Usia_Menstruasi_Pertama_Kali=req_body['Usia_Menstruasi_Pertama_Kali']
    Status_mens=req_body['Status_mens']
    Usia_menopause=req_body['Usia_menopause']
    Usia_melahirkan_anak_pertama=req_body['Usia_melahirkan_anak_pertama']
    Lama_menyusui_anak1=req_body['Lama_menyusui_anak1']
    Lama_menyusui_anak2=req_body['Lama_menyusui_anak2']
    Lama_menyusui_anak3=req_body['Lama_menyusui_anak3']
    Jumlah_berapa_kali_keguguran=req_body['Jumlah_berapa_kali_keguguran']
    Pasien_tanpa_keluhan=req_body['Pasien_tanpa_keluhan']
    Lama_keluhan_yg_dirasakan_di_payudara=req_body['Lama_keluhan_yg_dirasakan_di_payudara']
    Keluhan_puting_susu_tertarik_kedlm=req_body['Keluhan_puting_susu_tertarik_kedlm']
    Keluhan_payudara_keluar_cairan=req_body['Keluhan_payudara_keluar_cairan']
    Keluhan_perubahan_pada_kulit_payudara=req_body['Keluhan_perubahan_pada_kulit_payudara']
    Keluhan_lain_di_payudara=req_body['Keluhan_lain_di_payudara']
    Terdapat_benjolan_pada_payudara=req_body['Terdapat_benjolan_pada_payudara']
    Memiliki_keluarga_dengan_kanker=req_body['Memiliki_keluarga_dengan_kanker']
    Keluhan_brt_badan_turun=req_body['Keluhan_brt_badan_turun']
    Tiroid_berdebar_mr3=req_body['Tiroid_berdebar_mr3']
    Keluhan_lain_pada_tiroid=req_body['Keluhan_lain_pada_tiroid']
    Terdapat_benjolan_pada_tiroid=req_body['Terdapat_benjolan_pada_tiroid']
    Lama_keluhan_lain=req_body['Lama_keluhan_lain']
    Benjolan_pd_organ_lain=req_body['Benjolan_pd_organ_lain']
    Keluhan_rasa_sakit=req_body['Keluhan_rasa_sakit']
    Keluhan_lain=req_body['Keluhan_lain']
    Menderita_penyakit_lain_lain_pada_mr3=req_body['Menderita_penyakit_lain_lain_pada_mr3']
    Menderita_penyakit_di_payudara=req_body['Menderita_penyakit_di_payudara']
    Terapi_hormonal_u_penyakit_di_payudara=req_body['Terapi_hormonal_u_penyakit_di_payudara']
    Thn_kemoterapi_u_penyakit_di_payudara=req_body['Thn_kemoterapi_u_penyakit_di_payudara']
    Penggunaan_obat_lainnya=req_body['Penggunaan_obat_lainnya']
    Riwayat_penggunaan_radioterapi=req_body['Riwayat_penggunaan_radioterapi']
    Terapi_lainnya=req_body['Terapi_lainnya']
    Pasien_menderita_hipertensi=req_body['Pasien_menderita_hipertensi']
    Mendapatkan_pengobatan_u_hypertensi=req_body['Mendapatkan_pengobatan_u_hypertensi']
    Pasien_menderita_kencing_manis=req_body['Pasien_menderita_kencing_manis']
    Mendapatkan_pengobatan_untuk_kencing_manis=req_body['Mendapatkan_pengobatan_untuk_kencing_manis']
    Pasienmenderit_asma=req_body['Pasienmenderit_asma']
    Mendapatkan_pengobatan_asma=req_body['Mendapatkan_pengobatan_asma']
    Pasien_memiliki_alergi_obat=req_body['Pasien_memiliki_alergi_obat']
    Pasien_menderita_penyakit_lain=req_body['Pasien_menderita_penyakit_lain']
    Penyakit_lain_pd_keluarga=req_body['Penyakit_lain_pd_keluarga']
    Penyakit_hipertensi_pd_keluarga=req_body['Penyakit_hipertensi_pd_keluarga']
    Penyakit_kencing_manis_pd_keluarga=req_body['Penyakit_kencing_manis_pd_keluarga']
    Penyakit_asma_pada_keluarga=req_body['Penyakit_asma_pada_keluarga']
    Riwayat_alergi_pd_keluarga=req_body['Riwayat_alergi_pd_keluarga']
    IS_USG=req_body['IS_USG']
    IS_MAMMOGRAPHY=req_body['IS_MAMMOGRAPHY']
    IS_VC=req_body['IS_VC']
    IS_HPA=req_body['IS_HPA']
    IS_IHC=req_body['IS_IHC']
    IS_IOC=req_body['IS_IOC']
    IS_SITOLOGI=req_body['IS_SITOLOGI']
    IS_FNA=req_body['IS_FNA']
    #data = [[STATUS_NIKAH_PASIEN,umur,Pernah_Menggunakan_Pil,Pernah_Menggunakan_Suntik,Pernah_Menggunakan_Susuk,Pernah_Menggunakan_IUD,Pernah_Menggunakan_Kontrasepsi_Lain,Sekarang_Menggunakan_Pil,Sekarang_Menggunakan_Suntik,Sekarang_Menggunakan_Susuk,Sekarang_Menggunakan_IUD,Sekarang_Menggunakan_Kontrasepsi_Lain,Jumlah_Anak_LK,Jml_Anak_Pr,Jml_Anak_Meninggal,Status_Hormonal_,Usia_Menstruasi_Pertama_Kali,Usia_menopause,Usia_melahirkan_anak_pertama,Lama_menyusui_anak1,Lama_menyusui_anak2,Lama_menyusui_anak3,Jumlah_berapa_kali_keguguran,Pasien_tanpa_keluhan,Lama_keluhan_yg_dirasakan_di_payudara,Keluhan_puting_susu_tertarik_kedlm,Keluhan_payudara_keluar_cairan,Keluhan_perubahan_pada_kulit_payudara,Keluhan_lain_di_payudara,Terdapat_benjolan_pada_payudara,Memiliki_keluarga_dengan_kanker,Keluhan_brt_badan_turun,Tiroid_berdebar_mr3,Keluhan_lain_pada_tiroid,Terdapat_benjolan_pada_tiroid,Lama_keluhan_lain,Benjolan_pd_organ_lain,Keluhan_rasa_sakit,Keluhan_lain,Menderita_penyakit_lain_lain_pada_mr3,Menderita_penyakit_di_payudara,Terapi_hormonal_u_penyakit_di_payudara,Thn_kemoterapi_u_penyakit_di_payudara,Penggunaan_obat_lainnya,Riwayat_penggunaan_radioterapi,Terapi_lainnya,Pasien_menderita_hipertensi,Mendapatkan_pengobatan_u_hypertensi,Pasien_menderita_kencing_manis,Mendapatkan_pengobatan_untuk_kencing_manis,Pasienmenderit_asma,Mendapatkan_pengobatan_asma,Pasien_memiliki_alergi_obat,Pasien_menderita_penyakit_lain,Penyakit_lain_pd_keluarga,Penyakit_hipertensi_pd_keluarga,Penyakit_kencing_manis_pd_keluarga,Penyakit_asma_pada_keluarga,Riwayat_alergi_pd_keluarga,IS_USG,IS_MAMMOGRAPHY,IS_VC,IS_HPA,IS_IHC,IS_IOC,IS_SITOLOGI,IS_FNA]]
    #data = [[STATUS_NIKAH_PASIEN,umur,Keluhan_lain,Menderita_penyakit_lain_lain_pada_mr3,Menderita_penyakit_di_payudara]]
    #array = np.reshape(-1.1)
    #clf = joblib.load('filename.pkl')
    canc=request.get_json()
    canc = clf.predict([
	
	                              [STATUS_NIKAH_PASIEN,umur,Pernah_Menggunakan_Pil,Pernah_Menggunakan_Suntik,Pernah_Menggunakan_Susuk,Pernah_Menggunakan_IUD,Pernah_Menggunakan_Kontrasepsi_Lain,Sekarang_Menggunakan_Pil,Sekarang_Menggunakan_Suntik,Sekarang_Menggunakan_Susuk,Sekarang_Menggunakan_IUD,Sekarang_Menggunakan_Kontrasepsi_Lain,Jumlah_Anak_LK,Jml_Anak_Pr,Jml_Anak_Meninggal,Status_Hormonal_,Usia_Menstruasi_Pertama_Kali,Status_mens,Usia_menopause,Usia_melahirkan_anak_pertama,Lama_menyusui_anak1,Lama_menyusui_anak2,Lama_menyusui_anak3,Jumlah_berapa_kali_keguguran,Pasien_tanpa_keluhan,Lama_keluhan_yg_dirasakan_di_payudara,Keluhan_puting_susu_tertarik_kedlm,Keluhan_payudara_keluar_cairan,Keluhan_perubahan_pada_kulit_payudara,Keluhan_lain_di_payudara,Terdapat_benjolan_pada_payudara,Memiliki_keluarga_dengan_kanker,Keluhan_brt_badan_turun,Tiroid_berdebar_mr3,Keluhan_lain_pada_tiroid,Terdapat_benjolan_pada_tiroid,Lama_keluhan_lain,Benjolan_pd_organ_lain,Keluhan_rasa_sakit,Keluhan_lain,Menderita_penyakit_lain_lain_pada_mr3,Menderita_penyakit_di_payudara,Terapi_hormonal_u_penyakit_di_payudara,Thn_kemoterapi_u_penyakit_di_payudara,Penggunaan_obat_lainnya,Riwayat_penggunaan_radioterapi,Terapi_lainnya,Pasien_menderita_hipertensi,Mendapatkan_pengobatan_u_hypertensi,Pasien_menderita_kencing_manis,Mendapatkan_pengobatan_untuk_kencing_manis,Pasienmenderit_asma,Mendapatkan_pengobatan_asma,Pasien_memiliki_alergi_obat,Pasien_menderita_penyakit_lain,Penyakit_lain_pd_keluarga,Penyakit_hipertensi_pd_keluarga,Penyakit_kencing_manis_pd_keluarga,Penyakit_asma_pada_keluarga,Riwayat_alergi_pd_keluarga,IS_USG,IS_MAMMOGRAPHY,IS_VC,IS_HPA,IS_IHC,IS_IOC,IS_SITOLOGI,IS_FNA]
								  
								])
    resp = Response(response=canc[0],
                    status=200, 
                    mimetype="application/json")

    return resp




#belum dikerjakan predict nya
def predict():
    # get iris object from request
    X = request.get_json()
    X = [[float(X['STATUS_NIKAH_PASIEN']), float(X['umur']), float(X['Pernah_Menggunakan_Pil']), float(X['Pernah_Menggunakan_Suntik'])]]

    # read model
    clf = joblib.load('filename.pkl')
    probabilities = clf.predict_proba(X)
    #return jsonify([{'name': 'Normal', 'value': round(probabilities[0, 0] * 100, 2)},
    #                {'name': 'Jinak', 'value': round(probabilities[0, 1] * 100, 2)},
    #                {'name': 'Ganas', 'value': round(probabilities[0, 2] * 100, 2)}])

    # run web server
if __name__=="__main__":
    app.run(debug=True)
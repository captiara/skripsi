<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Prediksi;
use App\Pasien;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Client;
use App\Http\Controllers\Buzz\Browser;

class PrediksisController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prediksis = DB::table('prediksiku')
        ->leftJoin('pasiens', 'prediksiku.pasiens_id', '=', 'pasiens.id')
        ->select('prediksiku.*', 'pasiens.nama as pasiens_nama', 'pasiens.id as pasiens_id')
        ->paginate(5);
        //dd($prediksis);
        return view('prediksi-rs/index', ['prediksis' => $prediksis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cities = City::all();
        // $states = State::all();
     
        $pasiens = Pasien::all();
        return view('prediksi-rs/create', ['pasiens' => $pasiens]);
    }
    public function save(Request $request, $id)
   {
    //validasi data
    
    $this->validate($request, [
    	'CLASS'	=> 'required|max:255|string'
    ]);

    //menyimpan ke table posts kemudian redirect page 
    $prediksiku = Prediksi::find($id);
    $prediksiku->CLASS=$request->CLASS;
    $prediksiku->save();
   // $prediksiku = Prediksiku::create(['CLASS' => $request->CLASS]);
    return redirect(route('prediksis.create'));
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datadisplayapi()
    {
        $prediksis=Prediksi::all();
        return response()->json($prediksis);
    }

    public function showdataapi($id)
    {
        $prediksis=Prediksi::select('*')->where('pasiens_id',$id)->first();
        return response()->json($prediksis);
    
    }
    
    public function store(Request $request)
    {
             $prediksis = Prediksi::create($request->all());        
             $header = array('Content-Type'=>'application/json');
             $client = new \GuzzleHttp\Client();
            try {
             $response = $client->request('POST','http://157.230.252.251:8000/api/predict',['body'=>json_encode($request->all()), 'headers'=>$header]);
            }
            catch(\GuzzleHttp\Exception\ServerException $e) {
                dd($e);
            }
            $resBody= $response->getBody();

            return view('diagnosa-rs/index', ['resBody' => $resBody, 'id' => $prediksis->id] );
            //echo $response->getBody();

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prediksi = Prediksi::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($prediksi == null || count($prediksi) == 0) {
            return redirect()->intended('/prediksi-rs');
        }

        $pasiens = Pasien::all();
      
    
        return view('prediksi-rs/edit', ['prediksi' => $prediksi,  'pasiens' => $pasiens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prediksi= Prediksi::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['pasiens_id',
        'STATUS_NIKAH_PASIEN',
        'umur', 
        'Pernah_Menggunakan_Pil',
        'Pernah_Menggunakan_Suntik',
        'Pernah_Menggunakan_Susuk',
        'Pernah_Menggunakan_IUD',
        'Pernah_Menggunakan_Kontrasepsi_Lain',
        'Sekarang_Menggunakan_Pil',
        'Sekarang_Menggunakan_Suntik',
        'Sekarang_Menggunakan_Susuk',
        'Sekarang_Menggunakan_IUD',
        'Sekarang_Menggunakan_Kontrasepsi_Lain',
        'Jumlah_Anak_LK','Jml_Anak_Pr',
        'Jml_Anak_Meninggal', 'Status_Hormonal_','Usia_Menstruasi_Pertama_Kali','Status_mens','Usia_menopause','Usia_melahirkan_anak_pertama','Lama_menyusui_anak1','Lama_menyusui_anak2','Lama_menyusui_anak3','Jumlah_berapa_kali_keguguran','Pasien_tanpa_keluhan','Lama_keluhan_yg_dirasakan_di_payudara','Keluhan_puting_susu_tertarik_kedlm','Keluhan_payudara_keluar_cairan','Keluhan_perubahan_pada_kulit_payudara','Keluhan_lain_di_payudara','Terdapat_benjolan_pada_payudara',
        'Memiliki_keluarga_dengan_kanker','Keluhan_brt_badan_turun','Tiroid_berdebar_mr3','Keluhan_lain_pada_tiroid','Terdapat_benjolan_pada_tiroid','Lama_keluhan_lain','Benjolan_pd_organ_lain','Keluhan_rasa_sakit','Keluhan_lain','Menderita_penyakit_lain_lain_pada_mr3','Menderita_penyakit_di_payudara','Terapi_hormonal_u_penyakit_di_payudara','Thn_kemoterapi_u_penyakit_di_payudara','Penggunaan_obat_lainnya',
        'Riwayat_penggunaan_radioterapi','Terapi_lainnya','Pasien_menderita_hipertensi','Mendapatkan_pengobatan_u_hypertensi','Pasien_menderita_kencing_manis','Mendapatkan_pengobatan_untuk_kencing_manis','Pasienmenderit_asma','Mendapatkan_pengobatan_asma','Pasien_memiliki_alergi_obat','Pasien_menderita_penyakit_lain','Penyakit_lain_pd_keluarga','Penyakit_hipertensi_pd_keluarga','Penyakit_kencing_manis_pd_keluarga','Penyakit_asma_pada_keluarga','Riwayat_alergi_pd_keluarga',
        'IS_USG','IS_MAMMOGRAPHY','IS_VC','IS_HPA','IS_IHC','IS_IOC','IS_SITOLOGI','IS_FNA' ];
        $input = $this->createQueryInput($keys, $request);
       // if ($request->file('picture')) {
         //   $path = $request->file('picture')->store('avatars');
           // $input['picture'] = $path;
        //}

        Prediksi::where('id', $id)
            ->update($input);

        return redirect()->intended('/prediksis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Prediksi::where('id', $id)->delete();
         return redirect()->intended('/prediksis');
    }


     /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name)
    {
       
    }
    private function validateInput($request) {
        $this->validate($request, [ 
            'pasiens_id'=> 'required',
            'umur'=>'required|max:40',
            'STATUS_NIKAH_PASIEN'=>'required',
            'Pernah_Menggunakan_Pil'=> 'required',
            'Pernah_Menggunakan_Suntik'=> 'required',
            'Pernah_Menggunakan_Susuk'=> 'required',
            'Pernah_Menggunakan_IUD'=> 'required',
            'Pernah_Menggunakan_Kontrasepsi_Lain'=> 'required',
            'Sekarang_Menggunakan_Pil'=> 'required',
            'Sekarang_Menggunakan_Suntik'=> 'required',
            'Sekarang_Menggunakan_Susuk'=> 'required',
            'Sekarang_Menggunakan_IUD'=> 'required',
            'Sekarang_Menggunakan_Kontrasepsi_Lain'=> 'required',
            'Jumlah_Anak_LK'=> 'required',
            'Jml_Anak_Pr'=> 'required',
            'Jml_Anak_Meninggal'=> 'required',
            'Status_Hormonal_'=> 'required',
            'Usia_Menstruasi_Pertama_Kali'=> 'required',
            'Status_mens'=>'required',
            'Usia_menopause'=> 'required',
            'Usia_melahirkan_anak_pertama'=> 'required',
            'Lama_menyusui_anak1'=> 'required',
            'Lama_menyusui_anak2'=> 'required',
            'Lama_menyusui_anak3'=> 'required',
            'Jumlah_berapa_kali_keguguran'=> 'required',
            'Pasien_tanpa_keluhan'=> 'required',
            'Lama_keluhan_yg_dirasakan_di_payudara'=> 'required',
            'Keluhan_puting_susu_tertarik_kedlm'=> 'required',                      
            'Keluhan_payudara_keluar_cairan'=> 'required',
            'Keluhan_perubahan_pada_kulit_payudara'=> 'required',
            'Keluhan_lain_di_payudara'=> 'required',
            'Terdapat_benjolan_pada_payudara'=> 'required',
            'Memiliki_keluarga_dengan_kanker'=> 'required',
            'Keluhan_brt_badan_turun'=> 'required',
            'Tiroid_berdebar_mr3'=> 'required',
            'Keluhan_lain_pada_tiroid'=> 'required',
            'Terdapat_benjolan_pada_tiroid'=> 'required',
            'Lama_keluhan_lain'=> 'required',
            'Benjolan_pd_organ_lain'=> 'required',
            'Keluhan_rasa_sakit'=> 'required',
            'Keluhan_lain'=> 'required',
            'Menderita_penyakit_lain_lain_pada_mr3'=> 'required',
            'Menderita_penyakit_di_payudara'=> 'required',
            'Terapi_hormonal_u_penyakit_di_payudara'=> 'required',
            'Thn_kemoterapi_u_penyakit_di_payudara'=> 'required',
            'Penggunaan_obat_lainnya'=> 'required',
            'Riwayat_penggunaan_radioterapi' => 'required',
            'Terapi_lainnya'=> 'required',
            'Pasien_menderita_hipertensi'=> 'required',
            'Mendapatkan_pengobatan_u_hypertensi'=> 'required',
            'Pasien_menderita_kencing_manis'=> 'required',
            'Mendapatkan_pengobatan_untuk_kencing_manis'=> 'required',
            'Pasienmenderit_asma'=> 'required',
            'Mendapatkan_pengobatan_asma'=> 'required',
            'Pasien_memiliki_alergi_obat'=> 'required',
            'Pasien_menderita_penyakit_lain'=> 'required',
            'Penyakit_lain_pd_keluarga'=> 'required',
            'Penyakit_hipertensi_pd_keluarga'=> 'required',
            'Penyakit_kencing_manis_pd_keluarga'=> 'required',
            'Penyakit_asma_pada_keluarga'=> 'required',
            'Riwayat_alergi_pd_keluarga'=> 'required',
            'IS_USG'=> 'required',
            'IS_MAMMOGRAPHY'=> 'required',
            'IS_VC'=> 'required',
            'IS_HPA'=> 'required',
            'IS_IHC'=> 'required',
            'IS_IOC'=> 'required',
            'IS_SITOLOGI'=> 'required',
            'IS_FNA'=> 'required'
            
        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}

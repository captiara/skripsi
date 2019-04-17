<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dokter;
use App\Category;
use App\Pasien;
use App\Pemeriksaan;

class PemeriksaansController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $pemeriksaans = DB::table('pemeriksaans')

        ->leftJoin('category', 'pemeriksaans.category_id', '=', 'category.id')
        
        ->leftJoin('pasiens', 'pemeriksaans.pasiens_id', '=', 'pasiens.id')
        ->leftJoin('dokters', 'pemeriksaans.dokters_id', '=', 'dokters.id')
        ->select('pemeriksaans.*', 'pasiens.nama as pasiens_nama', 'pasiens.id as pasiens_id', 'dokters.nama as dokters_nama', 'dokters.id as dokters_id')
        ->paginate(5);
        // dd($pemeriksaans);
        return view('pemeriksaan-rs/index', ['pemeriksaans' => $pemeriksaans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        // $cities = City::all();
        // $states = State::all();
        $category = Category::all();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('pemeriksaan-rs/create', ['category' => $category, 'pasiens' => $pasiens, 'dokters' => $dokters]);
    }
    public function getData($role, $id)
    {
        if($role == "dokter"){
        $data = Pemeriksaan::with('pasiens','category')->select("*")->where('dokters_id',$id)->get();
        }
        else{
        $data = Pemeriksaan::with('dokters','category')->where('pasiens_id',$id)->get();
        }

        if($data!=null){
            return response()->json([
                'status' => true,
                'message' => "Ambil Data Berhasil",
                'response' => $data
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Ambil Data Tidak Berhasil",
                'response' => []
            ]);
        }
    }
    public function makeAppointment (Request $request)
    {
        $pemeriksaans = Pemeriksaan::create($request->all());
        if($pemeriksaans != null ){
            return response()->json([
                'status' => true,
                'message' => "Ambil Data Berhasil",
                'response' => $pemeriksaans->fresh()
            ]);

        }else{
            return response()->json([
                'status' => false,
                'message' => "Ambil Data Tidak Berhasil",
                'response' => new \stdClass()
            ]);
        }

    }
    public function doAppointment(Request $request){
        $keys = ['hasil_periksa', 'resep_obat', 'treatment', 'status'];
        $input = $this->createQueryInput($keys, $request);
        $pemeriksaans = Pemeriksaan::where('id', $request['id'])
            ->update($input);
            if($pemeriksaans != null ){
                return response()->json([
                    'status' => true,
                    'message' => "Terimakasih pemeriksaan Berhasil",
                    'response' => $pemeriksaans
                ]);
    
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Maaf pemeriksaan gagal",
                    'response' => new \stdClass()
                ]);
            }
    
        

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validateInput($request);
        // Upload image
       // $path = $request->file('picture')->store('avatars');
        $keys = ['pasiens_id', 'dokters_id', 'category_id', 'tgl_periksa', 'hasil_periksa', 'resep_obat', 'treatment'];
        $pemeriksaans = Pemeriksaan::create($request->all());
        if($pemeriksaans){

        }else{
            dd($request->all());
        }

        return redirect()->intended('/pemeriksaans');
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
        $this->middleware('auth');
        $pemeriksaan = Pemeriksaan::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($pemeriksaan == null || count($pemeriksaan) == 0) {
            return redirect()->intended('/pemeriksaan-rs');
        }
        $categories = Category::all();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
    
        return view('pemerisaaan-rs/edit', ['pemeriksaan' => $pemeriksaan, 'dokters' => $dokters, 'pasiens' => $pasiens, 'categories' => $categories]);
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
        $this->middleware('auth');
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['pasiens_id', 'dokters_id', 'category_id', 'tgl_periksa', 'hasil_periksa', 'resep_obat', 'treatment'];
        $input = $this->createQueryInput($keys, $request);
       // if ($request->file('picture')) {
         //   $path = $request->file('picture')->store('avatars');
           // $input['picture'] = $path;
        //}

        Pemeriksaan::where('id', $id)
            ->update($input);

        return redirect()->intended('/pemeriksaans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('auth');
         Pemeriksaan::where('id', $id)->delete();
         return redirect()->intended('/pemeriksaans');
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $this->middleware('auth');
        $constraints = [
            'pasiens.nama' => $request['pasiens_nama'],
            'dokters.nama' => $request['dokters_nama']
            ];
        $pemeriksaans = $this->doSearchingQuery($constraints);
        $constraints['dokters_nama'] = $request['dokters_nama'];
        $constraints['pasiens_nama'] = $request['pasiens_nama'];
        return view('pemeriksaan-rs/index', ['pemeriksaans' => $pemeriksaans, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = DB::table('pemeriksaans')
        ->leftJoin('dokters', 'pemeriksaans.dokters_id', '=', 'dokters.id')
        ->leftJoin('category', 'pemeriksaans.category_id', '=', 'category.id')
        ->leftJoin('pasiens', 'pemeriksaans.pasiens_id', '=', 'pasiens.id')
        ->select( 'pemeriksaans.*','pasiens.nama as pasiens_nama', 'pasiens.id as pasiens_id', 'dokters.nama as dokters_nama', 'dokters.id as dokters_id', 'category.id as category_id', 'category.name as category_name');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

     /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'pasiens_id' => 'required',
            'dokters_id' => 'required',
            'category_id' => 'required',
            'resep_obat' => 'required',
            'tgl_periksa' => 'required',
            'hasil_periksa' => 'required',
            'treatment' => 'required'
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
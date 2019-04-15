<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Pasien;

class PasiensController extends Controller
{
    
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/pasien-rs';

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
        $pasiens = Pasien::paginate(5);

        return view('pasien-rs/index', ['pasiens' => $pasiens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien-rs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dataapi()
    {
        $pasiens=Pasien::all();
        return response()->json($pasiens);
    }

     /**
     * Login.
     *
     */
    public function loginPasien(Request $request)
    {
        $data = $request->all();

        $pasien = Pasien::select('*')->where('email',$data["email"])->where('password',$request["password"])->first();

        if($pasien!=null){
            return response()->json([
                'status' => true,
                'message' => "Login Sukses",
                'response' => $pasien
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Email atau Password Salah",
                'response' => new class{}
            ]);
        }
    }

    public function registerPasien(Request $request)
    {        
        $pasien = Pasien::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => $request["password"],
            'tempatLahir' => $request['tempatLahir'],
            'tanggalLahir' => $request['tanggalLahir'],
            'alamat'=>$request['alamat'],
            'token'=>hash('sha1', date('YmdHis'))
        ]);

        return response()->json($pasien);
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
         Pasien::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'tempatLahir' => $request['tempatLahir'],
            'tanggalLahir' => $request['tanggalLahir'],
            'alamat'=>$request['alamat']
        ]);

        return redirect()->intended('/pasiens');
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
        $pasien = Pasien::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($pasien == null || count($pasien) == 0) {
            return redirect()->intended('/pasien-rs');
        }

        return view('pasien-rs/edit', ['pasien' => $pasien]);
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
        $pasien= Pasien ::findOrFail($id);
        $constraints = [
            'nama' => 'required|max:20',
            'alamat'=> 'required|max:60',
            'tanggalLahir' => 'required|max:60',
            'tempatLahir' => 'required|max:60'
            ];
        $input = [
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'tanggalLahir' => $request['tanggalLahir'],
            'tempatLahir' => $request['tempatLahir']
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        Pasien::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/pasiens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Pasien::where('id', $id)->delete();
         return redirect()->intended('/pasiens');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'tanggalLahir' => $request['tanggalLahir'],
            'tempatLahir' => $request['tempatLahir']
            ];

       $pasiens = $this->doSearchingQuery($constraints);
       return view('pasien-rs/index', ['pasiens' => $pasiens, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Pasien::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'nama' => 'required',
        'alamat'=> 'required|max:60',
        'tanggalLahir' => 'required',
        'tempatLahir' => 'required'
    ]);
    }
}

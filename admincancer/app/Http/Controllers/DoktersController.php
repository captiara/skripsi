<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dokter;

class DoktersController extends Controller
{
        /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dokter-rs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $dokters = Dokter::paginate(5);

        return view('dokter-rs/index', ['dokters' => $dokters]);
    }
    public function loginDokter(Request $request)
    {
        $data = $request->all();

        $dokters= Dokter::select('*')->where('email',$data["email"])->where('password',$request["password"])->first();

        if($dokters!=null){
            return response()->json([
                'status' => true,
                'message' => "Login Sukses",
                'response' => $dokters
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Email atau Password Salah",
                'response' => new class{}
            ]);
        }
    }
    public function list()
    {
        return Dokter::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('dokter-rs/create');
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
         Dokter::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => $request['password'],
            'tempatLahir' => $request['tempatLahir'],
            'tanggalLahir' => $request['tanggalLahir'],
            'alamat'=>$request['alamat']
        ]);

        return redirect()->intended('/dokters');
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

        $dokter = Dokter::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($dokter == null || count($dokter) == 0) {
            return redirect()->intended('/dokter-rs');
        }

        return view('dokter-rs/edit', ['dokter' => $dokter]);
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

        $dokter= Dokter ::findOrFail($id);
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
            Dokter::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/dokters');
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

       Dokter::where('id', $id)->delete();
         return redirect()->intended('/dokters');
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

       $dokters = $this->doSearchingQuery($constraints);
       return view('dokter-rs/index', ['dokters' => $dokters, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Dokter::query();
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


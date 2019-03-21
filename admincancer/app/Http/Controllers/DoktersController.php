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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::paginate(5);

        return view('dokter-rs/index', ['dokters' => $dokters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validateInput($request);
         Dokter::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
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


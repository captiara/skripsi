<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Client;
use App\Http\Controllers\Buzz\Browser;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
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
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=1521af11601e43b193718bf7aea75e9a', [
        //     'query'  => [
        //         'title' => 'Wisnubrata',
        //         'description' => 'Ahli Gizi Sebut 4 Bumbu Masakan Ini Mampu Perpanjang Usia - Lifestyle Kompas.com',
        //         'apiKey' => '1521af11601e43b193718bf7aea75e9a'
        //     ]
        // ]);
        return view('artikel-rs/index');
       // return view('diagnosa-rs/index', ['resBody' => $resBody] );
    }
   
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;


class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $categories = Category::paginate(8);

        return view('kategori-rs/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('kategori-rs/create');
    }
    public function list()
    {
        return response()->json(Category::all());
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
         Category::create([
            'name' => $request['name'],
            'kategori_id' => $request['kategori_id']
        ]);

        return redirect()->intended('/category');
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
        $category = Category::find($id);
        // Redirect to country list if updating country wasn't existed
        if ($category == null || count($category) == 0) {
            return redirect()->intended('/kategori-rs');
        }

        return view('kategori-rs/edit', ['category' => $category]);
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
        $category = Category::findOrFail($id);
        $input = [
            'name' => $request['name'],
            'kategori_id' => $request['kategori_id']
        ];
        $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        Category::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/category');
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
        Category::where('id', $id)->delete();
         return redirect()->intended('/category');
    }

    /**
     * Search country from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name'],
            'kategori_id' => $request['kategori_id']
            ];

       $categories = $this->doSearchingQuery($constraints);
       return view('kategori-rs/index', ['categories' => $categories, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = category::query();
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
        'name' => 'required|max:60|unique:category',
        'kategori_id' => 'required|max:3|unique:category'
    ]);
    }
}

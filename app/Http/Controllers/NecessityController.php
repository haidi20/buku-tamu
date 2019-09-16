<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Necessity;

class NecessityController extends Controller
{
    public function index()
    {
        $data = Necessity::paginate(10);

        return view('necessity.index', compact('data'));
    }

    public function store()
    {
        if(request('id')){
            $data = Necessity::find(request('id'));
        }else{
            $data = new Necessity;
        }

        $data->name = request('name');
        $data->save();

        return $data;
    }

    public function destroy()
    {
        $data = Necessity::destroy(request('id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peep;
use Auth;

class PeepController extends Controller
{
    public function addnew(){
        return view('people.addnew');
    }

    public function save(){
        $peep = new Peep();
        $peep->name = \request('name');
        $peep->number = \request('number');
        $peep->addedBy = \request('addedBy');

        $peep->save();
        return redirect('/')->with(['$name'=>$peep->name]);
    }

    public function isAdmin(){
        $user = Auth::user();
        $list = Peep::all();
        $restricted = Peep::where('addedBy',$user->name)->get();
        return view('/people.listpeople',['result'=>$list,'restricted'=>$restricted]);
    }

    public function delete($id){
        $peep = Peep::findOrFail($id);
        $name = $peep->name;
        $peep->delete();
        return redirect('/listpeople')->with(['$name'=>$name]);
    }
}

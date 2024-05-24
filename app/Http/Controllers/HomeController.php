<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = Auth::id();
        $todos = todo::where('userid', $userid)->get();

        return view('home') -> with('todos',$todos);
    }
    public function add(){
             return view('add');


    }

    public function store_todo(Request $request){
       
        $userid = Auth::id();
        $todo = new todo();
        $todo -> userid = $userid;
        $todo->Title = $request->input('title');
        $todo -> status = $request ->input('status');
        
        
        $todo -> save();
  
        return redirect() -> route('home');
           


    }

    public function delete_todo($id){
           $todo = todo::find($id);
           $todo -> delete();

           return redirect() -> route('home');
           



    }
    public function update_todo(Request $request,$id){
      $todo = todo::find($id);
      
      $todo->Title = $request->input('title');
      $todo -> status = $request ->input('status');
      
      
      $todo -> update();

      return redirect() -> route('home');
      

    }

}

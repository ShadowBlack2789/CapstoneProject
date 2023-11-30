<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Duties;

class DutiesController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('super');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('super.task')->with('users', $users);
    }

    
    public function userSelection($id)
    {
        $user = DB::table('users')
                ->join('duties', 'users.id', '=' , 'duties.user_id')
                ->where('duties.user_id', $id)
                ->get();

        if ((count($user)) > 0){
            return view('super.duties_table')->with('userSelected', $user);
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDuties = $request->validate([
            'user_id' => 'required',
            'rooms_number' => 'required',
            'start_date' => 'required',
            'notes' => 'required'
        ]);

        // Create Duties Date;
        $duties = new Duties;
        $duties->rooms_number = $request->input('rooms_number');
        $duties->notes = $request->notes;
        $duties->start_date = date('y-m-d H:i:s', strtotime($request->input('start_date')));
        $duties->user_id = $request->input('user_id');
        $duties->building_id = "1";
        $duties->save();

        return redirect('/display_calendar');
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
        $UserPost = DB::table('users')
                    ->join('duties', 'users.id', '=' , 'duties.user_id')
                    ->where('duties.id', $id)
                    ->get();
        return view('super.update_task')->with('userPost', $UserPost);
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
        $clearner_id = DB::table('users')
                       ->join('duties', 'users.id', '=', 'duties.user_id')
                       ->select('user_id')
                       ->where('duties.id', $id )
                       ->get(); 

        $this->validate($request, [
            'rooms_number' => 'required',
            'notes' => 'required'
        ]);

        $updateDuties = Duties::find($id);
        $updateDuties->rooms_number = $request->input('rooms_number');
        $updateDuties->notes = $request->notes;
        $updateDuties->start_date = date('y-m-d H:i:s', strtotime($request->input('start_date')));
        $updateDuties->user_id = $clearner_id[0]->user_id; 
        $updateDuties->building_id = "1";
        $updateDuties->save();
        
        return redirect('/tables');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_user = Duties::find($id);
        $delete_user->delete();

        return redirect('/tables');
    }
}

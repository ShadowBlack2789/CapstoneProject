<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vacation;

class VactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::pluck('first_name', 'id');
        return view('super.vacation')->with('vacations', $user);
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

    public function userSelection($id)
    {   
        $user = DB::table('users')
                ->join('vacations', 'users.id', '=' , 'vacations.user_id')
                ->where('vacations.user_id', $id)
                ->get();
          
        if ((count($user)) > 0){
            return view('super.vacation_table')->with('userSelected', $user);
        }else{
            return back();
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
        $this->validate($request, [
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // Create Duties Date;
        // Note changes the variable from duties to vacation or something else
        $duties = new Vacation;
        $duties->start_date = $request->input('start_date');
        $duties->end_date = $request->input('end_date');
        $duties->user_id = $request->input('user_id');
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
        $userPost = DB::table('users')
                    ->join('vacations', 'users.id', '=', 'vacations.user_id')
                    ->where('vacations.id', $id)
                    ->get();
        return view('super.update_vacation')->with('userPost', $userPost);
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
                       ->join('vacations', 'users.id', '=', 'vacations.user_id')
                       ->select('user_id')
                       ->where('vacations.id', $id )
                       ->get(); 

        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $updateVacation = Vacation::find($id);
        $updateVacation->start_date = $request->input('start_date');
        $updateVacation->end_date = $request->input('end_date');
        $updateVacation->user_id = $clearner_id[0]->user_id;
        $updateVacation->save();
        
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
        $delete_user = Vacation::find($id);
        $delete_user->delete();

        return redirect('/tables');
    }
}

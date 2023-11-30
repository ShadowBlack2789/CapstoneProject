<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Absent;

class AbsentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::pluck('first_name', 'id');
        return view('super.absents')->with('absents', $user);
    }

    public function userSelection($id)
    {
        $user = DB::table('users')
                ->join('absents', 'users.id', '=' , 'absents.user_id')
                ->where('absents.user_id', $id)
                ->get();

        if ((count($user)) > 0){
            return view('super.absent_table')->with('userSelected', $user);
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
        $this->validate($request, [
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

         // Create Duties Date;
         // Changes the variable name to something else
         $duties = new Absent;
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
        $UserPost = DB::table('users')
                    ->join('absents', 'users.id', '=', 'absents.user_id')
                    ->where('absents.id', $id)
                    ->get();
        return view('super.update_absents')->with('userPost', $UserPost);
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
                       ->join('absents', 'users.id', '=', 'absents.user_id')
                       ->select('user_id')
                       ->where('absents.id', $id)
                       ->get();
        $this->validate($request,[
            'start_date' => 'required',
            'end_date' => 'required'
        ]); 

        $updateAbsent = Absent::find($id);
        $updateAbsent->start_date = $request->input('start_date');
        $updateAbsent->end_date = $request->input('end_date');
        $updateAbsent->user_id = $clearner_id[0]->user_id;
        $updateAbsent->save();

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
        $delete_user = Absent::find($id);
        $delete_user->delete();

        return redirect('/tables');
    }
}

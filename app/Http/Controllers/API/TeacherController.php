<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return User::whereHas('roles', function($query){
          $query->where('name', 'teacher');
          })->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $role_teacher = Role::where('name', 'teacher')->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->dni);
        $user->dni = $request->dni;
        $user->save();
        $user->roles()->attach($role_teacher);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return User::whereHas('roles', function($query){
          $query->where('name', 'teacher');
          })->get();
        // return User::where('id', $id)->with('courses')->first();
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
         $user = User::find($id);
         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->email = $request->email;
         if(!empty($request->password)){
         $user->password = $request->password;
            }
         $user->dni = $request->dni;
         $user->save();
         return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}

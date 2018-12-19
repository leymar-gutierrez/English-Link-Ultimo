<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;

class ApiController extends Controller
{
    public function AddStudentForEmail(Request $request){
    $lists = $request->lists;
    $course = $request->course;
    if($lists){
           foreach ($lists as $email) {
                  $user = User::where('email', $email)->first();
                  if ($user === null && $email != '') {
                    $user = new User;
                    $user->email = $email;
                    $user->save();
                  }
                  $user->courses()->attach($course);

           }
     }
   }

   public function showStudentCourse(Request $request){
//          if($request->courseid){
//          $course_id = $request->courseid;
//          $students = User::whereHas('courses', function($query){
//          $query->where('courses.id', 5);
//          })->get();
//          return $students;
//
//    } else{
//    return 'todo mal';
// }
      $id = $request->courseid;
  return Course::where('id', $id)->with('users')->first();
   }


   public function showCountCourse(){
         return Course::all()->count();
   }
   public function showCountStudent(){
         return User::whereHas('roles', function($query){
         $query->where('name', 'student');
            })->count();
   }






}

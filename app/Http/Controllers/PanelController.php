<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;

class PanelController extends Controller
{

  // VISTA QUE SE DEVUELVEN PARA EL ADMIN
    public function showCourses()
    {
      return view('panel.admin.courses');
    }
    public function showStudents()
    {
      return view('panel.admin.students');
    }
    public function showTeachers()
    {
      return view('panel.admin.teachers');
    }
    public function showAll()
    {
          $course = Course::all()->count();
         $students = User::whereHas('roles', function($query){
          $query->where('name', 'student');
             })->count();
            return view('panel.admin.showall', compact('course', 'students'));
    }

    // VISTAS QUE SE DEVUELVEN PARA EL TEACHER

    public function tablaDeCourse()
    {
      return view('panel.teachers.course');
    }
    public function studentForCourse()
    {
      return view('panel.teachers.studentforcourse');
    }

    // VISTAS QUE DEVUELVEN PARA EL STUDENT

    public function panelStudents()
    {
      return view('panel.user.profile');
    }
}

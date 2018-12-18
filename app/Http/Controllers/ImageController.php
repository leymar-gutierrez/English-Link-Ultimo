<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function upload($request)
    {
        $request->user->update(['avatar' => $request->image]);
        return response(null, 202);
    }

    public function saveImage(Request $request)
    {


      if ($request->hasFile('image')) {
      $ext = $request->image->extension();
      $user = Auth::user()->dni;
      $imageName = $user .'.'. $ext;
      $user = Auth::user();
      $user->image_id = $imageName;
      $user->save();
      $nombre = request()->file('image')->storeAS('users', $imageName);
      // $datos = request()->all();
      // $datos['image'] = $nombre;
      }

        // if ($request->hasFile('image')) {
        //   $ext = request()->file('image')->extension();
        //   $imageName = $request->image->getClientOriginalName();
        //   $nombre = request()->file('image')->storeAs('users', $imageName.'.'.$ext);
        //
        //   $datos = request()->all();
        //   $datos['image'] = $nombre;
        // }
        // return response(null, 202);
    }
  }

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
         // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new profile;
      $form = $request->all();
      $profile->fill($form)->save();
        


        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        $profile = profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', compact('profile'));
      //return view('admin.profile.edit',  ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
          // Validationをかける
     $this->validate($request, profile::$rules);
      // Modelからデータを取得する
      $profile = profile::find($request->id);
      //dd($profile);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      //dd($profile_form);
      $profile->fill($profile_form)->save();
        return view('admin/profile/create');
    }
    
}



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
      return view('admin.profile.edit',  ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
          // Validationをかける
     $this->validate($request, profile::$rules);
      // News Modelからデータを取得する
      //$profile_form = profile::find($request->id);
      //dd($profile_form);
      // 送信されてきたフォームデータを格納する
      //$profile_form->name = $request->input('name');
      //$profile->gender = $request->input('gender');
      //$profile->hobby = $request->input('hobby');
      //$profile->introduction = $request->input('introduction');
      
      // 該当するデータを上書きして保存する
      //$profile->save();

      // Modelからデータを取得する
      $profile = profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      //dd($profile_form);
      $profile->fill($profile_form)->save();

      
      

        return view('admin/profile/create');
    }
    
}



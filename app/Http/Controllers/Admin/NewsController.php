<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;


class NewsController extends Controller
{
  public function add()
  {
      return view('admin.news.create');
  }
  
   public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, News::$rules);

      $news = new News;
      $form = $request->all();

      //formに画像があれば、保存する
      if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();

      return redirect('admin/news/create');

  }
 
}
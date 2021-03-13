@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-4">
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-sm-10 col-md-8">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2">タイトル</label>
                        <div class="col-sm-6 col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-sm-2 col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ \Str::limit($news->title, 100) }}</td>
                                    <td>{{ \Str::limit($news->body, 250) }}</td>
                                    <td>
                                        <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>
                                    </td>    
                                    <td>
                                        <form method="POST" action="{{ route('news.delete', ['id' => $news->id]) }}" id="delete_{{ $news->id }}" >
                                        @csrf
                                         <a href="#" class="btn btn-danger" data-id="{{ $news->id }}" onclick="deletePost(this);">削除</a>
                                        </form>
                                    </td>
                                           
                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
<!--
function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection
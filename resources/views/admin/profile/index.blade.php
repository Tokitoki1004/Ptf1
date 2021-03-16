@extends('layouts.admin')
@section('title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
          
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">氏名</th>
                                <th width="10%">性別</th>
                                <th width="20%">趣味</th>
                                <th width="30%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <th>{{ $profile->name }}</th>
                                    <td>{{ $profile->gender }}</td>
                                    <td>{{ \Str::limit($profile->hobby, 250) }}</td>
                                    <td>{{ \Str::limit($profile->introduction, 250) }}</td>
                                    <td>
                                        <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                    </td>    
                                    <td>
                                        <form method="POST" action="{{ route('profile.delete', ['id' => $profile->id]) }}" id="delete_{{ $profile->id }}" >
                                        @csrf
                                         <a href="#" class="btn btn-danger" data-id="{{ $profile->id }}" onclick="deletePost(this);">削除</a>
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
    if (confirm('本当にこのプロフィールを削除してもいいですか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection
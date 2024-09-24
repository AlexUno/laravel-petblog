@extends('layouts.main')
@section('head-title', 'Мои посты')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-5 ">
                <h2>Комментарии</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(count($comments))
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Новые комментарии</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Пользователь</th>
                                    <th>Текст</th>
                                    <th>Ответить</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>{{ Illuminate\Support\Str::limit(strip_tags($comment->message), 30)}}</td>
                                            <td><a style="color: blue;" href="{{ route('posts.show', $comment->post->id) }}">Ссылка на пост</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $comments->links() }}
                    </div>
                </div>
                @else
                <h2 style="color: #808080;">
                    Нет новых комментариев
                </h2>
                @endif
            </div>
        </div>
    </div>
@endsection

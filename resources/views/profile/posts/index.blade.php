@extends('layouts.main')
@section('head-title', 'Мои посты')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-5 ">
                <h2>Мои посты</h2>
            </div>
            <div class="col-md-6 my-5 d-flex justify-content-end">
                <a href="{{ route('profile.posts.create') }}" class="btn btn-primary">Новый пост</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Все посты</h3>

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
                                            <th>Название</th>
                                            <th>Категория</th>
                                            <th>Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->title }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('profile.posts.edit', $post->id) }}" class="mr-2 btn btn-primary px-2 py-1">
                                                        <i class="fas fa-pen" style="font-size: 12px;"></i>
                                                    </a>
                                                    <a href="{{ route('profile.posts.show', $post->id) }}" class="mr-2 btn btn-secondary px-2 py-1">
                                                        <i class="fas fa-eye" style="font-size: 12px;"></i>
                                                    </a>
                                                    <form action="{{ route('profile.posts.destroy', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger px-2 py-1">
                                                            <i class="fas fa-trash" style="font-size: 12px;"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
        </div>
    </div>
@endsection

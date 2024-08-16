@extends('admin.layouts.main')
@section('head-title', $post->title )
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Детально
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.posts.show', $post) }}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-wrap">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Название</th>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <b>Превью изображение</b>
                                            </div>
                                            <img width="200" height="200" src="{{ $post->preview_image ? asset('storage/' . $post->preview_image) : asset('assets/admin/img/avatar.png') }}" alt="preview_image"/>
                                        </td>
                                        <td>
                                            <div>
                                                <b>Главное изображение</b>
                                            </div>
                                            <img width="200" height="200" src="{{ $post->main_image ? asset('storage/' . $post->main_image) : asset('assets/admin/img/avatar.png') }}" alt="main_image"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Содержимое</th>
                                        <td>{!! $post->content !!}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Категория
                                        </th>
                                        <td>
                                            {{ $post->category->title }}
                                        </td>
                                    </tr>
                                    @if(count($post->tags) > 0)
                                        <tr>
                                            <th>
                                                Теги
                                            </th>
                                            <td>
                                                @foreach($post->tags as $tag)
                                                    @if ($loop->first)
                                                        {{ $tag->title }}
                                                    @else
                                                        {{ ', ' . $tag->title }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>
                                            Автор
                                        </th>
                                        <td>
                                            {{ $post->user->name }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

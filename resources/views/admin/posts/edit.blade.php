@extends('admin.layouts.main')
@section('head-title', 'Редактировать пост')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Редактировать пост
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.posts.edit', $post) }}
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
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="col-9">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ $post->title }}"
                                placeholder="Введите название поста">
                        </div>
                        @error('title')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="d-block" for="name">Превью изображение</label>
                                    <img id="previewAvatar"
                                         class="mb-3"
                                         src="{{ $post->preview_image ? asset('storage/' . $post->preview_image) : asset('assets/admin/img/avatar.png') }}"
                                         alt="avatar"
                                         width="200"
                                         height="200"/>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="preview_image" value="{{ old('preview_image') }}" type="file" class="custom-file-input" id="preview_image">
                                            <label class="custom-file-label" for="preview_image">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                </div>
                                @error('preview_image')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="d-block" for="name">Главное изображение</label>
                                    <img id="previewAvatar"
                                         class="mb-3"
                                         src="{{ $post->preview_image ? asset('storage/' . $post->main_image) : asset('assets/admin/img/avatar.png') }}"
                                         alt="avatar"
                                         width="200"
                                         height="200"/>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="main_image" value="{{ old('main_image') }}" type="file" class="custom-file-input" id="main_image">
                                            <label class="custom-file-label" for="main_image">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                </div>
                                @error('main_image')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Текст</label>
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                    <div class="col-3">
                        @if(count($categories) > 0)
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        @endif

                        @if(count($tags) > 0)
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select class="select2"
                                            name="tag_ids[]"
                                            multiple="multiple"
                                            data-placeholder="Выберите теги"
                                            style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                value="{{ $tag->id }}"
                                                {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tags[]')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                        @endif
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

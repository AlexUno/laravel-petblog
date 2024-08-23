@extends('layouts.main')
@section('head-title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>Мой профиль</h2>
                <form action="{{ route('profile.update') }}" method="post" class="mt-5" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="avatar" class="form-label d-block">Аватар</label>
                        <img id="previewAvatar"
                             class="mb-3"
                             src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/admin/img/avatar.png') }}"
                             alt="avatar"
                             width="200"
                             height="200"/>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="avatar" type="file" class="custom-file-input" id="avatar">
                                <label class="custom-file-label" for="avatar">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('avatar')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ Auth::user()->name }}"/>
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

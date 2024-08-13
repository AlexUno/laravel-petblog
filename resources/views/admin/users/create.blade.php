@extends('admin.layouts.main')
@section('head-title', 'Новый пользователь')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Добавить пользователя
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.users.create') }}
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
                    <div class="col-6">
                        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="d-block" for="name">Аватар</label>
                                <img id="previewAvatar"
                                     class="mb-3"
                                     src="{{ asset('assets/admin/img/avatar.png') }}"
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
                            </div>
                            @error('avatar')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Введите имя">
                            </div>
                            @error('name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Введите email">
                            </div>
                            @error('email')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    value="{{ old('password') }}"
                                    placeholder="Введите пароль">
                            </div>
                            @error('password')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            @if($roles->count() > 0)
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option
                                            value="{{ $role->id }}"
                                            {{ ($role->slug === 'user') ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

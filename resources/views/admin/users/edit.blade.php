@extends('admin.layouts.main')
@section('head-title', 'Редактировать пользователя')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Редактировать пользователя
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.users.edit', $user) }}
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
                        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ $user->name }}"
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
                                    value="{{ $user->email }}"
                                    placeholder="Введите email">
                            </div>
                            @error('email')
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
                                                {{ ($role->id == $user->role_id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

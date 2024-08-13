@extends('admin.layouts.main')
@section('head-title', 'Пользователи')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Список пользователей
                        </h1>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            Новый пользователь
                        </a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.users.index') }}
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
                            <div class="card-header">
                                <h3 class="card-title">Все</h3>

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
                                        <th>Аватар</th>
                                        <th>Пользователь</th>
                                        <th>Email</th>
                                        <th>Роль</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <img
                                                        width="40"
                                                        height="40"
                                                        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/admin/img/avatar.png') }}"
                                                        alt="avatar"/>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="mr-2 btn btn-primary px-2 py-1">
                                                        <i class="fas fa-pen" style="font-size: 12px;"></i>
                                                    </a>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

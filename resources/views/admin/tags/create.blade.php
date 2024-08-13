@extends('admin.layouts.main')
@section('head-title', 'Новый тег')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 mb-2">
                            Добавить тег
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{ Breadcrumbs::render('admin.tags.create') }}
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
                        <form action="{{ route('admin.tags.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="Введите тег">
                            </div>
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

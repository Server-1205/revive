@extends('layouts.admin')

@section('content')
    <setion class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="row ">

                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title"> </h1>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.categories.update', $category) }}" role="form">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" class="form-control" id="title"
                                           name="title"
                                           value="{{ $category->title ?? '' }}"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Слаг</label>
                                    <input type="text" class="form-control" id="slug"
                                           name="slug"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Описание</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ...">{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="parent">Родительская категория</label>
                                    <select class="form-control" id="parent" name="parent_id">
                                        <option value="0" selected>-- Без категории --</option>
                                            @include('blog.admin.categories._categories')
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </setion>
@endsection


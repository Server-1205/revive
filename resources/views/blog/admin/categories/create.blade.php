@extends('layouts.admin')

@section('content')
    <section class="content">
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
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title"></h3>--}}
{{--                        </div>--}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.categories.store') }}" role="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" class="form-control" id="title"
                                           name="title"
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
                                    <textarea class="form-control" rows="10" placeholder="Enter ..."></textarea>
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
    </section>
@endsection

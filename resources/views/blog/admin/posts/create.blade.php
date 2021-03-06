{{-- You can change this template using File > Settings > Editor > File and Code Templates > Code > Laravel Ideal View --}}
@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
{{--                    <h1>Добавить статью</h1>--}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="post" class="">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Добавить статью</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Заголовок статьи</label>
                                <input type="text"
                                       id="title"
                                       name="title"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание статьи</label>
                                <textarea id="description" class="form-control"
                                          name="preview_text"
                                          rows="4"></textarea>
                            </div>
                            <div class="form-group pad">
                                <div class="mb-3">
                                    <label for="content">Текст статьи</label>
                                    <textarea class="textarea"
                                              name="detail_text"
                                              id="content"
                                              placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Заголовок статьи</label>
                                    <input type="file"
                                           id="title"
                                           name="image"
                                           class="form-control">
                                </div>
                            </div>

                            @if ($categoryList)
                                <div class="form-group">
                                    <label for="category">Выбрать категорию</label>
                                    <select
                                        name="category_id"
                                        id="category"
                                        class="form-control custom-select">
                                        @include('blog.admin.posts._categories')
                                    </select>
                                </div>
                            @endif
                            <div class="form-check">
                                <input type="hidden" value="0" name="is_published">
                                <input class="form-check-input"
                                       name="is_published"
                                       type="checkbox"
                                       value="1" id="is_published">
                                <label class="form-check-label" for="is_published">
                                    Опубликовано
                                </label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <input type="submit" value="Добавить" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>

    <!-- /.content -->

@stop

{{-- You can change this template using File > Settings > Editor > File and Code Templates > Code > Laravel Ideal View --}}
@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить статью</h1>
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
        <form action="{{ route('admin.posts.store') }}" method="post" class="">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
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
                                <label for="slug">Адрес статьи</label>
                                <input type="text"
                                       id="slug"
                                       name="slug"
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
                                    <label for="inputStatus">Выбрать категорию</label>
                                    <select
                                        name="category_id"
                                        class="form-control custom-select">
                                        @php /** @var App\Models\Category $category */ @endphp
                                        @foreach ($categoryList as $category)
                                            <option value="{{ $category->id }}" >{{ $category->title }}</option>
                                        @endforeach
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
                <div class="col-md-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Estimated budget</label>
                                <input type="number" id="inputEstimatedBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Total amount spent</label>
                                <input type="number" id="inputSpentBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimated project duration</label>
                                <input type="number" id="inputEstimatedDuration" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>

    <!-- /.content -->

@stop

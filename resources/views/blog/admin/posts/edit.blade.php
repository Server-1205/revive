@extends('layouts.admin')

@section('content')
@php /**  @var \App\Models\Post $postItem */ @endphp
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
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
        <form action="{{ route('admin.posts.update', $postItem) }}" enctype="multipart/form-data" method="post"  class="">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать статью</h3>

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
                                       value="{{ old('title',$postItem->title) }}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание статьи</label>
                                <textarea id="description" class="form-control"
                                          name="preview_text"
                                          rows="4">{{ $postItem->preview_text }}</textarea>
                            </div>
                            <div class="form-group pad">
                                <div class="mb-3">
                                    <label for="content">Текст статьи</label>
                                    <textarea class="textarea"
                                              name="detail_text"
                                              id="content"
                                              placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $postItem->detail_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Изображение статьи</label>
                                    <input type="file"
                                           id="title"
                                           name="image"
                                           value="{{$postItem->image}}"
                                           class="form-control">
                                </div>
                            </div>

                            <img src="{{ $path }}{{ $postItem->image}}" width="300" alt="">
                            @if ($categoryList)
                                <div class="form-group">
                                    <label for="inputStatus">Выбрать категорию</label>
                                    <select
                                        name="category_id"
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
                                       @if ($postItem->is_published) checked @endif
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
                            <h3 class="card-title">Доп. данные</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Дата создания</label>
                                <input type="text" id="inputEstimatedBudget"
                                       name="created_at"
                                       value="{{ $postItem->created_at->format('Y-m-d') ?? '' }}"
                                       disabled
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Дата публикации</label>
                                <input type="text"
                                       disabled
                                       name="published"
                                       value="{{ $postItem->published_at ? $postItem->published_at->format('Y') : ''}}"
                                       id="inputSpentBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Дата удаления</label>
                                <input type="text"
                                       disabled
                                       id="inputEstimatedDuration"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <input type="submit" value="Сохранить" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>

    <!-- /.content -->

@stop

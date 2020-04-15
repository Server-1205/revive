@extends('layouts.admin')

@php /** @var  App\Models\Category $categories */ @endphp
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Категории</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                @if ($categories)
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                 Категория
                            </th>
                            <th style="width: 30%">
                                Родитель
                            </th>
                            <th style="width: 30%">

                            </th>
                            <th style="width: 20%">
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)


                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $category->title }}
                                    </a>
                                    <br/>
                                    <small>
                                        {{ $category->created_at }}
                                    </small>
                                </td>
                                <td>
                                    <a>
                                        {{ $category->parent_id }}
                                    </a>
                                    <br/>
                                    <small>

                                    </small>
                                </td>
                                <td>

                                </td>
                                <td class="form-inline">
                                    {{--                                    <a class="btn btn-primary btn-sm" href="#">--}}
                                    {{--                                        <i class="fas fa-folder">--}}
                                    {{--                                        </i>--}}
                                    {{--                                        View--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="btn btn-info btn-sm" href="#">--}}
                                    {{--                                        <i class="fas fa-pencil-alt">--}}
                                    {{--                                        </i>--}}
                                    {{--                                        Edit--}}
                                    {{--                                    </a>--}}
                                    <form class="" action="{{ route('admin.categories.destroy',$category->id) }}"
                                          method="post">
                                        <button type="submit" class="btn btn-info btn-sm mr-1">

                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit

                                        </button>
                                    </form>
                                    <form class="inline-flex"
                                          action="{{ route('admin.categories.destroy',$category->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm mr-1">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@stop

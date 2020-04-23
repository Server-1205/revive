@extends('layouts.admin')
@php /** @var \App\Models\Post $post */ @endphp

@section('content')
    <h1>{{ $post->title }}</h1>
@stop

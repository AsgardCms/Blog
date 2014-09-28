@extends('core::layouts.master')

@section('content-header')
<h1>
    Edit post
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ URL::route('dashboard.category.index') }}">Categories</a></li>
    <li class="active">Edit post</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['dashboard.category.update', $post->id], 'method' => 'put']) !!}

{!! Form::close() !!}
@stop
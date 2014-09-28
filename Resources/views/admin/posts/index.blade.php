@extends('core::layouts.master')

@section('content-header')
<h1>
    Blog posts
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Posts</li>
</ol>
@stop

@section('content')

@stop
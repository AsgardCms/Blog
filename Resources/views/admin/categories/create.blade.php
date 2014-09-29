@extends('core::layouts.master')

@section('content-header')
<h1>
    Create Category
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ URL::route('dashboard.category.index') }}">Categories</a></li>
    <li class="active">Create category</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['dashboard.category.store'], 'method' => 'post']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">English</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">French</a></li>
            </ul>
            <div class="tab-content">
                <div class="row">
                    @include('flash::message')
                </div>
                <div class="tab-pane active" id="tab_1-1">
                    @include('blog::admin.categories.partials.create-fields', ['lang' => 'en'])
                </div>
                <div class="tab-pane" id="tab_2-2">
                    @include('blog::admin.categories.partials.create-fields', ['lang' => 'fr'])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">Create category</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('dashboard.category.index')}}"><i class="fa fa-times"></i> Cancel</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
</div>

{!! Form::close() !!}
@stop
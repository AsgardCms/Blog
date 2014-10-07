@extends('core::layouts.master')

@section('styles')
<script src="{{ core_asset('js/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<link href="{{{ blog_asset('css/selectize.css') }}}" rel="stylesheet" type="text/css" />
@stop

@section('content-header')
<h1>
    {{ trans('blog::post.title.create post') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('dashboard.post.index') }}">{{ trans('blog::post.title.post') }}</a></li>
    <li class="active">{{ trans('blog::post.title.create post') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['dashboard.post.store'], 'method' => 'post']) !!}
<div class="row">
    <div class="col-md-10">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('core::core.tab.english') }}</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">{{ trans('core::core.tab.french') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="row">
                    @include('flash::message')
                </div>
                <div class="tab-pane active" id="tab_1-1">
                    @include('blog::admin.posts.partials.create-fields', ['lang' => 'en'])
                </div>
                <div class="tab-pane" id="tab_2-2">
                    @include('blog::admin.posts.partials.create-fields', ['lang' => 'fr'])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('blog::post.button.create post') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('dashboard.post.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
    <div class="col-md-2">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label("category", 'Category:') !!}
                    <select name="category" id="category" class="form-control">
                        <?php foreach($categories as $category): ?>
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('scripts')
<script src="{{ blog_asset('js/selectize.min.js') }}" type="text/javascript"></script>
<script src="{{ blog_asset('js/MySelectize.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replaceAll('ckeditor');
    });

    $( document ).ready(function() {
        $('.input-tags').MySelectize({
            'findUri' : '/api/tag/',
            'createUri' : '/api/tags/create/'
        });
    });
</script>
@stop
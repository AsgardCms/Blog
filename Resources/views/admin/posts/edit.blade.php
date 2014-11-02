@extends('core::layouts.master')

@section('styles')
<script src="{{ Module::asset('core', 'js/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<link href="{{{ Module::asset('blog', 'css/selectize.css') }}}" rel="stylesheet" type="text/css" />
@stop

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
{!! Form::open(['route' => ['dashboard.post.update', $post->id], 'method' => 'put']) !!}

<div class="row">
    <div class="col-md-10">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('core::core.tab.english') }}</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">{{ trans('core::core.tab.french') }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    @include('blog::admin.posts.partials.edit-fields', ['lang' => 'en'])
                </div>
                <div class="tab-pane" id="tab_2-2">
                    @include('blog::admin.posts.partials.edit-fields', ['lang' => 'fr'])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
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
                <div class='form-group{{ $errors->has("tags") ? ' has-error' : '' }}'>
                    {!! Form::label("tags", 'Tags:') !!}
                    <select name="tags[]" id="tags" class="input-tags" multiple>
                       <?php foreach($post->tags()->get() as $tag): ?>
                           <option value="{{ $tag->id }}" selected>{{ $tag->translate('en')->name }}</option>
                       <?php endforeach; ?>
                    </select>
                    {!! $errors->first("tags", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@stop

@section('scripts')
<script src="{{ Module::asset('blog', 'js/selectize.min.js') }}" type="text/javascript"></script>
<script src="{{ Module::asset('blog', 'js/MySelectize.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replaceAll(function( textarea, config ) {
            config.language = '<?php echo App::getLocale() ?>';
        } );
    });

    $( document ).ready(function() {
        $('.input-tags').MySelectize({
            'findUri' : '/api/tag/findByName/',
            'createUri' : '/api/tag'
        });
    });
</script>
@stop

@extends('layouts.master')

@section('styles')
    {!! Theme::style('vendor/jquery-ui/themes/base/datepicker.css') !!}
    {!! Theme::style('vendor/jquery-ui/themes/smoothness/theme.css') !!}
@stop

@section('content-header')
<h1>
    {{ trans('blog::post.title.create post') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ route('admin.blog.post.index') }}">{{ trans('blog::post.title.post') }}</a></li>
    <li class="active">{{ trans('blog::post.title.create post') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['admin.blog.post.store'], 'method' => 'post']) !!}
<div class="row">
    <div class="col-md-10">
        <div class="nav-tabs-custom">
            @include('partials.form-tab-headers', ['fields' => ['title', 'slug']])
            <div class="tab-content">
                <?php $i = 0; ?>
                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php $i++; ?>
                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        @include('blog::admin.posts.partials.edit-fields', ['lang' => $locale])
                    </div>
                <?php endforeach; ?>
                <?php if (config('asgard.blog.config.post.partials.normal.create') !== []): ?>
                    <?php foreach (config('asgard.blog.config.post.partials.normal.create') as $partial): ?>
                    @include($partial)
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('blog::post.button.create post') }}</button>
                    <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.blog.post.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label("category", trans('blog::post.form.category')) !!}
                    <select name="category_id" id="category" class="form-control">
                        <?php foreach ($categories as $category): ?>
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label("status", trans('blog::post.form.status')) !!}
                    <select name="status" id="status" class="form-control">
                        <?php foreach ($statuses as $id => $status): ?>
                        <option value="{{ $id }}" {{ old('status', 0) == $id ? 'selected' : '' }}>{{ $status }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                @tags('asgardcms/post')
                <div class='form-group{{ $errors->has("post_date") ? ' has-error' : '' }}'>
                    <?php $oldPostDate = isset($post->post_date) ? date('Y-m-d', strToTime($post->post_date)) : date('Y-m-d'); ?>
                    {!! Form::label("post_date", trans('blog::post.form.post date')) !!}
                    {!! Form::text("post_date", old("post_date", $oldPostDate), ['class' => 'form-control datepicker', 'placeholder' => trans('blog::post.form.post_date')]) !!}
                    {!! $errors->first("post_date", '<span class="help-block">:message</span>') !!}
                </div>
                @mediaSingle('thumbnail')
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index', ['name' => 'posts']) }}</dd>
    </dl>
@stop

@section('scripts')
    {!! Theme::script('vendor/jquery-ui/ui/datepicker.js') !!}
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.datepicker').datepicker({
                buttonImageOnly: true,
                dateFormat: "yy-mm-dd",
                prevText: '',
                nextText: ''
            });
        });
    </script>
@stop

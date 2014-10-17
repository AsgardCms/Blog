@extends('core::layouts.master')

@section('content-header')
<h1>
    {{ trans('blog::category.title.edit category') }} <small>{{ $category->name }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('dashboard.category.index') }}">{{ trans('blog::category.title.category') }}</a></li>
    <li class="active">{{ trans('blog::category.title.edit category') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['dashboard.category.update', $category->id], 'method' => 'put']) !!}
<div class="row">
    <div class="col-md-12">
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
                    @include('blog::admin.categories.partials.edit-fields', ['lang' => 'en'])
                </div>
                <div class="tab-pane" id="tab_2-2">
                    @include('blog::admin.categories.partials.edit-fields', ['lang' => 'fr'])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('dashboard.category.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
</div>

{!! Form::close() !!}
@stop

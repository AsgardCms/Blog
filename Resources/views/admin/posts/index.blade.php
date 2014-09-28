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
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            @include('flash::message')
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ URL::route('dashboard.post.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                    <i class="fa fa-pencil"></i> New Post
                </a>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="data-table table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Created at</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($posts->count() > 0): ?>
                        <?php foreach($posts as $post): ?>
                            <tr>
                                <td>
                                    <a href="{{ URL::route('dashboard.post.edit', [$post->id]) }}">
                                        {{ $post->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('dashboard.post.edit', [$post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('dashboard.post.edit', [$post->id]) }}">
                                        {{ $post->slug }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ URL::route('dashboard.post.edit', [$post->id]) }}" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#confirmation-{{ $post->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Created at</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
    </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "aoColumns": [
                null,
                null,
                null,
                { "bSortable": false }
            ]
        });
    });
</script>
@stop
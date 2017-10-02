<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">{{ trans('blog::post.latest posts') }}</h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody><tr>
                <th style="width: 10px">#</th>
                <th>{{ trans('blog::post.table.title') }}</th>
                <th>{{ trans('core::core.table.created at') }}</th>
            </tr>
            @if (isset($latestPosts))
                @foreach ($latestPosts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div>

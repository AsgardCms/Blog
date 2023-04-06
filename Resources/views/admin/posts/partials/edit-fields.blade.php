<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        <?php $oldTitle = isset($post?->translate($lang)->title) ? $post->translate($lang)->title : ''; ?>
        {!! Form::label("{$lang}[title]", trans('blog::post.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.title", $oldTitle), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('blog::post.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("$lang.slug") ? ' has-error' : '' }}'>
        <?php $oldSlug = isset($post?->translate($lang)->slug) ? $post->translate($lang)->slug : ''; ?>
        {!! Form::label("{$lang}[slug]", trans('blog::post.form.slug')) !!}
        {!! Form::text("{$lang}[slug]", old("$lang.slug", $oldSlug), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('blog::post.form.slug')]) !!}
        {!! $errors->first("$lang.slug", '<span class="help-block">:message</span>') !!}
    </div>
    <?php $old = isset($post?->translate($lang)->content) ? $post->translate($lang)->content : ''; ?>
    @editor('content', trans('blog::post.form.content'), old("$lang.content", $old), $lang)

    <?php if (config('asgard.blog.config.post.partials.translatable.edit') !== []): ?>
        <?php foreach (config('asgard.blog.config.post.partials.translatable.edit') as $partial): ?>
        @include($partial)
        <?php endforeach; ?>
    <?php endif; ?>

    <br />
    <div class="panel box box-primary">
        <div class="box-header">
            <h4 class="box-title">
                <a href="#collapseMeta-{{ $lang }}" data-toggle="collapse" data-parent="#accordion" class="collapsed" aria-expanded="false">
                    {{ trans('blog::post.form.meta tags') }}
                </a>
            </h4>
        </div>
        <div id="collapseMeta-{{ $lang }}" class="panel-collapse collapse" style="height: 0;" aria-expanded="false">
            <div class="box-body">
                @foreach(['meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description'] as $fieldName)
                    <div class='form-group{{ $errors->has("$lang.meta_title") ? ' has-error' : '' }}'>
                        <?php $oldValue = isset($post?->translate($lang)->$fieldName) ? $post->translate($lang)->$fieldName : ''; ?>
                        {!! Form::label("{$lang}[{$fieldName}]", trans("blog::post.form.{$fieldName}")) !!}
                        {!! Form::text(
                            "{$lang}[{$fieldName}]",
                            old("$lang.{$fieldName}", $oldValue),
                            [
                                'class' => 'form-control',
                                'placeholder' => trans("blog::post.form.{$fieldName}")
                            ]
                        ) !!}
                        {!! $errors->first("$lang.{$fieldName}", '<span class="help-block">:message</span>') !!}
                    </div>
                @endforeach

            </div>
        </div>
    </div>


</div>

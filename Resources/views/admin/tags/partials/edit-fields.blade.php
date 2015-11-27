<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}[name]") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", trans('blog::tag.form.name')) !!}
        <?php $old = $tag->hasTranslation($locale) ? $tag->translate($lang)->name : '' ?>
        {!! Form::text("{$lang}[name]", Input::old("{$lang}[name]", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('blog::tag.form.name')]) !!}
        {!! $errors->first("{$lang}[name]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}[slug]") ? ' has-error' : '' }}'>
           {!! Form::label("{$lang}[slug]", trans('blog::tag.form.slug')) !!}
            <?php $old = $tag->hasTranslation($locale) ? $tag->translate($lang)->slug : '' ?>
           {!! Form::text("{$lang}[slug]", Input::old("{$lang}[slug]", $old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('blog::tag.form.slug')]) !!}
           {!! $errors->first("{$lang}[slug]", '<span class="help-block">:message</span>') !!}
       </div>
</div>

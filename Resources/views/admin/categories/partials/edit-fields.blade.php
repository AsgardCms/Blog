<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", trans('blog::category.form.name')) !!}
        <?php $old = $category->hasTranslation($locale) ? $category->translate($lang)->name : '' ?>
        {!! Form::text("{$lang}[name]", old("{$lang}[name]", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('blog::category.form.name')]) !!}
        {!! $errors->first("{$lang}.name", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
           {!! Form::label("{$lang}[slug]", trans('blog::category.form.slug')) !!}
            <?php $old = $category->hasTranslation($locale) ? $category->translate($lang)->slug : '' ?>
           {!! Form::text("{$lang}[slug]", old("{$lang}[slug]", $old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('blog::category.form.slug')]) !!}
           {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
       </div>
</div>

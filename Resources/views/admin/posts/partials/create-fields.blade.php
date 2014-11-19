<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('blog::post.form.title')) !!}
        {!! Form::text("{$lang}[title]", Input::old("{$lang}[title]"), ['class' => 'form-control slugify', 'placeholder' => trans('blog::post.form.title')]) !!}
        {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("{$lang}[slug]") ? ' has-error' : '' }}'>
       {!! Form::label("{$lang}[slug]", trans('blog::post.form.slug')) !!}
       {!! Form::text("{$lang}[slug]", Input::old("{$lang}[slug]"), ['class' => 'form-control slug', 'placeholder' => trans('blog::post.form.slug')]) !!}
       {!! $errors->first("{$lang}[slug]", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='box-body pad'>
        <textarea class="ckeditor" name="{{$lang}}[content]" rows="10" cols="80">
        </textarea>
    </div>
</div>

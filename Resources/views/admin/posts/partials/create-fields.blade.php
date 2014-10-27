<div class="box-body">
    <div class='form-group{{ $errors->has("title[{$lang}]") ? ' has-error' : '' }}'>
        {!! Form::label("title[{$lang}]", trans('blog::post.form.title')) !!}
        {!! Form::text("title[{$lang}]", Input::old("title[{$lang}]"), ['class' => 'form-control slugify', 'placeholder' => trans('blog::post.form.title')]) !!}
        {!! $errors->first("title[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("slug[{$lang}]") ? ' has-error' : '' }}'>
       {!! Form::label("slug[{$lang}]", trans('blog::post.form.slug')) !!}
       {!! Form::text("slug[{$lang}]", Input::old("slug[{$lang}]"), ['class' => 'form-control slug', 'placeholder' => trans('blog::post.form.slug')]) !!}
       {!! $errors->first("slug[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='box-body pad'>
        <textarea class="ckeditor" name="content[{{$lang}}]" rows="10" cols="80">
        </textarea>
    </div>
</div>

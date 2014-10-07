<div class="box-body">
    <div class='form-group{{ $errors->has("name[{$lang}]") ? ' has-error' : '' }}'>
        {!! Form::label("name[{$lang}]", trans('blog::post.form.title')) !!}
        {!! Form::text("name[{$lang}]", Input::old("name[{$lang}]"), ['class' => 'form-control', 'placeholder' => trans('blog::post.form.title')]) !!}
        {!! $errors->first("name[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("slug[{$lang}]") ? ' has-error' : '' }}'>
       {!! Form::label("slug[{$lang}]", trans('blog::post.form.slug')) !!}
       {!! Form::text("slug[{$lang}]", Input::old("slug[{$lang}]"), ['class' => 'form-control', 'placeholder' => trans('blog::post.form.slug')]) !!}
       {!! $errors->first("slug[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("tags[{$lang}]") ? ' has-error' : '' }}'>
       {!! Form::label("tags[{$lang}]", 'Tags:') !!}
       {!! Form::text("tags[{$lang}]", Input::old("tags[{$lang}]"), ['class' => 'form-control input-tags', 'placeholder' => 'Tags']) !!}
       {!! $errors->first("tags[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='box-body pad'>
        <textarea class="ckeditor" name="content[{{$lang}}]" rows="10" cols="80">
        </textarea>
    </div>
</div>
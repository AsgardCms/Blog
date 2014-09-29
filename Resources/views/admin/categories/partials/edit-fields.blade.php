<div class="box-body">
    <div class='form-group{{ $errors->has("name[{$lang}]") ? ' has-error' : '' }}'>
        {!! Form::label("name[{$lang}]", 'Name:') !!}
        {!! Form::text("name[{$lang}]", Input::old("name[{$lang}]", $category->translate($lang)->name), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        {!! $errors->first("name[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("slug[{$lang}]") ? ' has-error' : '' }}'>
           {!! Form::label("slug[{$lang}]", 'Slug:') !!}
           {!! Form::text("slug[{$lang}]", Input::old("slug[{$lang}]", $category->translate($lang)->slug), ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
           {!! $errors->first("slug[{$lang}]", '<span class="help-block">:message</span>') !!}
       </div>
</div>
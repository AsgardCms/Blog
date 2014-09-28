<div class="box-body">
    <div class='form-group{{ $errors->has('name') ? ' has-error' : '' }}'>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', Input::old('name', $category->translate($lang)->name), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has('slug') ? ' has-error' : '' }}'>
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', Input::old('slug', $category->translate($lang)->slug), ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
        {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
    </div>
</div>
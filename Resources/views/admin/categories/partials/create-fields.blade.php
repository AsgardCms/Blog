<div class="box-body">
    <div class='form-group{{ $errors->has("name[{$lang}]") ? ' has-error' : '' }}'>
        {!! Form::label("name[{$lang}]", trans('blog::category.form.name')) !!}
        {!! Form::text("name[{$lang}]", Input::old("name[{$lang}]"), ['class' => 'form-control', 'placeholder' => trans('blog::category.form.name')]) !!}
        {!! $errors->first("name[{$lang}]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("slug[{$lang}]") ? ' has-error' : '' }}'>
       {!! Form::label("slug[{$lang}]", trans('blog::category.form.slug')) !!}
       {!! Form::text("slug[{$lang}]", Input::old("slug[{$lang}]"), ['class' => 'form-control', 'placeholder' => trans('blog::category.form.slug')]) !!}
       {!! $errors->first("slug[{$lang}]", '<span class="help-block">:message</span>') !!}
   </div>
</div>

<!-- Jadwal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jadwal', 'Jadwal:') !!}
    {!! Form::text('jadwal', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat', 'Tempat:') !!}
    {!! Form::text('tempat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jadwals.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jadwal->id !!}</p>
</div>

<!-- Jadwal Field -->
<div class="form-group">
    {!! Form::label('jadwal', 'Jadwal:') !!}
    <p>{!! $jadwal->jadwal !!}</p>
</div>

<!-- Tempat Field -->
<div class="form-group">
    {!! Form::label('tempat', 'Tempat:') !!}
    <p>{!! $jadwal->tempat !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jadwal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jadwal->updated_at !!}</p>
</div>


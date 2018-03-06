<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kajian->mosque->nama !!}</p>
</div>

<!-- Id Mosque Field -->
<div class="form-group">
    {!! Form::label('id_mosque', 'Id Mosque:') !!}
    <p>{!! $kajian->id_mosque !!}</p>
</div>

<!-- Pemateri Field -->
<div class="form-group">
    {!! Form::label('pemateri', 'Pemateri:') !!}
    <p>{!! $kajian->pemateri !!}</p>
</div>

<!-- Tema Field -->
<div class="form-group">
    {!! Form::label('tema', 'Tema:') !!}
    <p>{!! $kajian->tema !!}</p>
</div>

<!-- Waktu Field -->
<div class="form-group">
    {!! Form::label('waktu', 'Waktu:') !!}
    <p>{!! $kajian->waktu !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $kajian->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $kajian->updated_at !!}</p>
</div>


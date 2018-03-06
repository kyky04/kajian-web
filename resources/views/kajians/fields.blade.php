<!-- Id Mosque Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_mosque', 'Id Mosque:') !!}
      <select name="id_mosque" class="form-control select1">
        @foreach($mosque as $mos)
         <option value="{{ $mos->id}}" >{{ 'id_mosque' == $mos->id ? 'selected="selected"' : '' }}{{ $mos->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Pemateri Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pemateri', 'Pemateri:') !!}
    {!! Form::text('pemateri', null, ['class' => 'form-control']) !!}
</div>

<!-- Tema Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tema', 'Tema:') !!}
    {!! Form::text('tema', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu', 'Hari:') !!}
    {!! Form::date('waktu', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('waktu_kajian', 'Waktu Kajian:') !!}
    {!! Form::time('waktu_kajian', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kajians.index') !!}" class="btn btn-default">Cancel</a>
</div>

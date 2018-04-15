@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jadwal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jadwal, ['route' => ['jadwals.update', $jadwal->id], 'method' => 'patch']) !!}

                        @include('jadwals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
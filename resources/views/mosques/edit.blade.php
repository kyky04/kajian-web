@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mosque
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mosque, ['route' => ['mosques.update', $mosque->id], 'method' => 'patch']) !!}

                        @include('mosques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kajian
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kajian, ['route' => ['kajians.update', $kajian->id], 'method' => 'patch']) !!}

                        @include('kajians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
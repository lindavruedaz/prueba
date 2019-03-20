@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Vendedores</h3></div>
         
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Dirección</th>
               <th>C.I</th>
               <th>Telefono</th>
             </thead>
             <tbody>

              @if($vendedor->count())  
              @foreach($vendedor as $vendedo)  
              <tr>
                <td>{{$vendedo->nombre}}</td>
                <td>{{$vendedo->direccion}}</td>
                <td>{{$vendedo->ci}}</td>
                <td>{{$vendedo->telf}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('vendedorcontroller@edit', $vendedo->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('vendedorcontroller@destroy', $vendedo->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
       <div class="pull-left">
            <div class="btn-group">
              <a href="{{ route('vendedor.create') }}" class="btn btn-info" >Agregar</a>
            </div>
          </div>
        {{ $vendedor->links() }}
</section>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Sukurti {{$category->name}} kategorijoje</div>

            <div class="card-body">
               <form method="POST" action="{{route('item.store')}}"  enctype="multipart/form-data" >
                  <div class="form-group">
                      <label>Prekės pavadinimas</label>
                      <input type="text" name="name"  class="form-control">
                      {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
                  </div>
                  
                  <div class="form-group">
                     <label>Prekės kaina</label>
                     <input type="text" name="price"  class="form-control">
                     {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
                 </div>
                 
                 <div class="form-group">
                  <label>Prekės aprašas</label>
                  <input type="text" name="description"  class="form-control">
                  {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
               </div>     

               <div class="form-group">
                  <label>Gamintojas</label>
                  <input type="text" name="manufacturer"  class="form-control">
                  {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
               </div>
              
              <div class="form-group">
               <label>Prekės likutis</label>
               <input type="text" name="quantity"  class="form-control">
               {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
           </div>
           
           <div class="form-group">
            <label>Nuolaida</label>
            <input type="text" name="discount"  class="form-control">
            {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
        </div>
        <input type="hidden" name="category_id" value="{{$category->id}}">
                  @foreach ($category->parameters as $param)
                      
                  <div class="form-group">
                      <label>{{$param->title}}</label>
                      <input type="text" name="{{$param->id}}"  class="form-control" placeholder="{{$param->data_type}}">
                      <small class="form-text text-muted"></small>
                  </div>
                  @endforeach
                  <input type="file" name="photos[]" id="" multiple>
                  @csrf
                  <button class="btn btn-success" type="submit">ADD</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
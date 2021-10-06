@extends('layouts.app')

@section('content')
<div id="showItem"></div>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
           

            <div class="card-body">
             
                  <div class="form-group">
                      <label>Prekės pavadinimas</label>
                      {{$item->name}}
                      {{-- <input type="text" name="name"  class="form-control"> --}}
                      {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
                  </div>
                  
                  <div class="form-group">
                     <label>Prekės kaina</label>
                     {{$item->price}}
                     {{-- <input type="text" name"price"  class="form-control"> --}}
                     {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
                 </div>
                 
                 <div class="form-group">
                  <label>Prekės aprašas</label>
                  {{$item->description}}
                  {{-- <input type="text" name="description"  class="form-control"> --}}
                  {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
               </div>     

               <div class="form-group">
                  <label>Gamintojas</label>
                  {{$item->manufacturer}}

                  {{-- <input type="text" name="manufacturer"  class="form-control"> --}}
                  {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
               </div>
              
              <div class="form-group">
               <label>Prekės likutis</label>
               {{$item->quantity}}

               {{-- <input type="text" name="quantity"  class="form-control"> --}}
               {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
           </div>
           <div class="form-group">
            <label>Rodyti prekę</label>
            cia patvarkyti
            <input type="checkbox" name="show" id="">
            {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
        </div>
           
           <div class="form-group">
            <label>Nuolaida</label>
            {{$item->discount}}

            {{-- <input type="text" name="discount"  class="form-control"> --}}
            {{-- <small class="form-text text-muted">Parametro pavadinimas.</small> --}}
        </div>
       
               
                @foreach ($item->parameters as $param)
                {{$param->title}} {{$param->pivot->data}} {{$param->data_type}} <br>
                @endforeach

                @if (Auth::user() && Auth::user()->isAdministrator())
                    
               
                    <form action="{{route('item.softDelete',$item)}}" method="post">
                        @csrf
                        @if ($item->status == 10)
                            <button class="btn btn-primary" type="submit" name="softDelete" value=1 >disable</button>   
                        @else
                            <button class="btn btn-success" type="submit" name="softDelete" value=0 >enable</button>
                        @endif
                    </form>
                @endif
               </div>
         </div>
      </div>
   </div>
</div>

@endsection
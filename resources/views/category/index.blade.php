
@extends('layouts.app')

@section('content')
<div class="container">
    
@if(Auth::user() && Auth::user()->isAdmin())
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Admino panelė
            </div>
            <div class="card-body">
                @if ((count($chain) > 0))
                    
                <a style="font-size:20px" href="{{route('item.create',[ $chain[count($chain)-1] ] )}}">Įdėti prekę į "{{$chain[count($chain)-1]->name}}" kategoriją</a><br>
                <?php $category =  $chain[count($chain)-1] ; ?>
                    
                @else
                <?php $category =  0; ?>
                @endif
                <a style="font-size:20px" href="{{route('category.create',[ $category ] )}}">sukurti kategoriją šiame gylyje</a> 

            </div>
        </div>
    </div>
</div>
@endif
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
            <h1>{{(count($chain) > 0)?$chain[count($chain)-1]->name :""}}</h1>


            {{-- <form action="{{route('category.update',$chain[count($chain)-1])}}" method="post">
                @csrf
                <select name="" id="">
                    <option value="0">pasirinkite parametrą</option>
                    @foreach ($parameters as $parameter)
                    <option value="{{$parameter->id}}">{{$parameter->title}} | {{$parameter->data_type}}</option>
                        
                    @endforeach
                </select>
                <button type="submit">pridėti</button>
            </form> --}}


        </div>
        <div class="card-header">
            @if (count($chain)== 0)
                HOME
            @endif
             @foreach ($chain as $item)
                 <a href="{{route('category.map',$item)}}"> {{$item->name}} ></a>
             @endforeach
         </div>
         
        <div class="card-body">
        <table class="table table-striped">
            <tbody>


            


            @foreach ($categories as $category)
         
            <tr>
              <td class=""> <a href="{{route('category.map',$category)}}"> {{$category->name}}</a></td>
              {{-- <td class="align-middle text-center">{{$parameter->data_type}}</td> --}}
              <td class="align-middle text-center">
                <a class="btn btn-primary" href="{{route('category.edit',[$category])}}">EDIT</a>
                <form style="display: inline-block" method="POST" action="{{route('category.destroy', $category)}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">DELETE</button>
                  </form>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>

        </div>


        <div class="card-body">
            <table class="table table-striped">
                <tbody>
    
    
                
    
    
                @foreach ($items as $item)
               
                <tr>
                    <td>{{$item->name}}</td>
                  {{-- <td class=""> <a href="{{route('item.map',$item)}}"> {{$item->name}}</a></td> --}}
                  {{-- <td class="align-middle text-center">{{$parameter->data_type}}</td> --}}
                  <td class="align-middle text-center">
                    <a class="btn btn-primary" href="{{route('item.show',[$item])}}">SHOW</a>
                    <a class="btn btn-primary" href="{{route('item.edit',[$item])}}">EDIT</a>
                    <form style="display: inline-block" method="POST" action="{{route('item.destroy', $item)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">DELETE</button>
                      </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
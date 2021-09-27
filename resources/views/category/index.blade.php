
@extends('layouts.app')

@section('content')
<div class="container">
    
@if(Auth::user() && Auth::user()->isAdmin())
<div class="row justify-content-center">
    <div class="col-lg-12">
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
    <div class="col-lg-12">
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
                 @if(next($chain))
                  <a class="chain" href="{{route('category.map',$item)}}"> {{$item->name}} ></a>
                 @else
                  <a class="chain chain-last" href="{{route('category.map',$item)}}"> {{$item->name}} </a>
                 @endif
             @endforeach
         </div>
         
        <div class="card-body">
        {{-- <table class="table table-striped">
            <tbody> --}}


            


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
            @endforeach
            </tbody>
          </table> 

        </div>


        <div class="card-body">
          @if(isset($items) )
            {{-- <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>pavadinimas</th>
                    <th>kaina</th>
                    <th class="text-center">valdymas</th>
                  </tr> --}}
    
                
    
             
                @foreach ($items as $item)
                <a href="#">
                  <div class="Item">
                    <div style="text-align:center;" >{{$item->name}}</div>
                    <div style="border: solid red 1px; margin-left:25px; width:200px;height:200px; position: relative; ">
                      @if(count($item->photos) > 0)
                        <img style="max-height:200px;  position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/items/small/".$item->photos[0]->name)}}" alt=""> 
                      @else
                        <img style="max-height:200px;  position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/icons/itemDefault.png")}}" alt=""> 
                      @endif
                    </div>
                    <div style="margin-left:25px; font-weight:900; font-size:18px;">{{$item->price}}€</div>
                    <div style="margin-left:25px;" >Gamintojas: {{$item->manufacturer}}</div>
                    <div style="margin-left:25px;" >Prekės likutis: {{$item->quantity}}</div>
                    <a style="margin-left:80px;"  class="btn btn-danger" href="">Į krepšelį</a>
                    {{-- <button style="margin-left:80px; z-index:99" class="btn btn-danger">Į krepšelį</button> --}}
                  </div>
                </a>
                {{-- <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                  {{-- <td class=""> <a href="{{route('item.map',$item)}}"> {{$item->name}}</a></td> --}}
                  {{-- <td class="align-middle text-center">{{$parameter->data_type}}</td> --}}
                  {{-- <td class="align-middle text-center">
                    <a class="btn btn-primary" href="{{route('item.show',[$item])}}">SHOW</a>
                    <a class="btn btn-primary" href="{{route('item.edit',[$item])}}">EDIT</a>
                    <form style="display: inline-block" method="POST" action="{{route('item.destroy', $item)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">DELETE</button>
                      </form>
                  </td>
                </tr> --}}
                @endforeach
                {{-- </tbody>
              </table> --}}
              @endif
              
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
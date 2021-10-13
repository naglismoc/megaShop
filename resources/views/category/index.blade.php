
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
     
            
            <div class="dropdown">
              {{-- <button  id="searchBtn" class="dropbtn btn btn-primary">Dropdown</button> --}}
              <div id="myDropdown" class="dropdown-content show">
                <input type="text" placeholder="Search.." id="searchBar" autocomplete="off">
                <div id="lines"></div>
              </div>
             tik akcijinės prekės <input type="checkbox" name="" id="discount">
            </div>


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
            @endforeach
            </tbody>
          </table> 

        </div>


        <div id=houseOfCards class="card-body">
          @if(isset($items) )
            {{-- <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>pavadinimas</th>
                    <th>kaina</th>
                    <th class="text-center">valdymas</th>
                  </tr> --}}
    
                
    
             
                @foreach ($items as $item)
                  {!!$item->card()!!}
                @endforeach
              @endif
              
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
  let urlSearchBar = "{{route('item.searchBar')}}";
  let itemShow = "{{route('item.show',1)}}"; 
</script>


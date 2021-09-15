


@extends('layouts.app')

@section('content')
<div class="container">
labas {{Auth::user()->name}}

@if(Auth::user()->isAdmin())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Admino panelė
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                         @csrf
                         <input type="text" name="name">   
                         @php
                             if(count($chain) == 0 ){

                                $categoryId = 0;
                             }else{
                                $categoryId = $chain[count($chain) -1]->id;
                             }
                             

                             
                         @endphp
                         <input type="hidden" name="category_id" value="{{$categoryId}}">
                        <button type="submit">pridėti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   @if (count($chain)== 0)
                       HOME
                   @endif
                    @foreach ($chain as $item)
                        <a href="{{route('category.map',$item)}}"> {{$item->name}} ></a>
                    @endforeach
                </div>

               <div class="card-body">
                    <a href="{{route('category.index')}}"> HOME</a><br><br>
    

                    @foreach ($categories as $category)
                    
                        <a href="{{route('category.map',$category)}}"> {{$category->name}}</a><br>
                        
                    @endforeach
                    {{-- {{dd($chain)}} --}}
                    <br>

               </div>
           </div>
       </div>
   </div>


   
</div>
@endsection

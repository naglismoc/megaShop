@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Atnaujinti</div>

            <div class="card-body">
               <form method="POST" action="{{route('plant_type.update',$plant_type)}}" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Augalo pavadinimas</label>
                      <input type="text" name="name" value="{{$plant_type->name}}" class="form-control">
                      <small class="form-text text-muted">Augalo pavadinimas.</small>
                  </div>
                  <div class="form-group">
                      <input type="checkbox" name="is_yearling" value="on" class="form-control-input" id="formCheck" <?=$plant_type->checkBoxActivation()?>>
                      <label class="form-check-label" for="formCheck">Vienmetis</label>
                      <small class="form-text text-muted">Pažymėkite, jei vienmetis.</small>
                  </div>
                  <div class="form-group">
                      <label>Augalo nuotrauka</label>
                      <div class="row">
                      <div class="col-5">
                      <?php if($plant_type->photo){ ?>
                        <img src="{{asset('plantPhotos/small/'.$plant_type->photo)}}" alt="photo">
                      <?php }?>
                      </div>
                   
                  </div>
                  </div>
                  @csrf
                  <button class="btn btn-success" type="submit">EDIT</button>
               </form>
                  <div class="col-7">
                      <form method="POST" action="{{route('plant_type.updatePhoto',$plant_type)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="photo"  class="form-control-file"><br>
                        <button class="btn btn-secondary" type="submit">Atnaujinti nuotrauką</button>
                     </form>
                     </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
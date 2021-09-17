{{-- @foreach ($item->getAttributes() as $item)
    {{$item}}
@endforeach --}}
{{-- 
@foreach($model->getAttributes() as $key => $value)
    // use $attribute
@endforeach --}}
@foreach ($item->parameters as $param)
    {{$param->title}} {{$param->pivot->data}} {{$param->data_type}} <br>
@endforeach
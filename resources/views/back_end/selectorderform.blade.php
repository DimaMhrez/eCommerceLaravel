@section('subcategories')

{!! Form::select('position2', array_pluck($subcategories, 'sortOrder'),
old('position2') ,
array('id'=>'position2','class'=>'selectpicker','data-st yle'=>'select-with-transition','title'=>'Position','required'=>'required')) !!}

@show
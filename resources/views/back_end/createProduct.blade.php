@extends('back_end.main')

<<<<<<< Updated upstream
@push('css')
   <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=00nueudafld12dihq6ks5qrbmxmcswey82ezvlef8qtt0r60"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endpush
=======
>>>>>>> Stashed changes

@section('content')
    <div class="content">
        <div class="container-fluid">
<<<<<<< Updated upstream
            <div class="col-md-10  col-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="blue" id="wizardProfile">
                    {{ Form::open(array('url' => 'admin/product','action' => ['enctype'=>'multipart/data','files'=>'true'])) }}
=======
            <div class="col-md-8 col-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="blue" id="wizardProfile">

                    {{ Form::open(array('url' => 'admin/product','action' => ['LiveSearch@autocompleteBrands'])) }}
                    <!-- <form action="" method=""> -->
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
>>>>>>> Stashed changes
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                New Product
                            </h3>
                            <h5 class="card-description">Wizard for insert a new product</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
<<<<<<< Updated upstream
                                    <a class="nav-link active" href="#basicinfo" data-toggle="tab" role="tab">
                                        Identification
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#bulletdescription" data-toggle="tab" role="tab">
                                        Bullet Description
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#fulldescription" data-toggle="tab" role="tab">
                                        Full Description
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#marketingoptions" data-toggle="tab" role="tab">
                                        Options
                                    </a>
                                </li>
=======
                                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                        Identification
                                    </a>
                                </li>
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                        Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                        Address
                                    </a>
                                </li>-->
>>>>>>> Stashed changes
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
<<<<<<< Updated upstream
                                <div class="tab-pane active" id="basicinfo">
                                    <h5 class="info-text"> Basic information</h5>
                                    <div class="row justify-content-center">
=======
                                <div class="tab-pane active" id="about">
                                    <h5 class="info-text"> Basic information</h5>
                                    <div class="row justify-content-center">
                                        <!--<div class="col-sm-4">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="https://demos.creative-tim.com/material-dashboard-pro/assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6 class="description">Choose Picture</h6>
                                            </div>
                                        </div>-->
>>>>>>> Stashed changes
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">devices</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
<<<<<<< Updated upstream
                                                    {{ Form::label('name', 'Product\'s name',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('name', old('name'),['class' => 'form-control','required' => 'required']) }}
=======

<!--
                                                    <label class="bmd-label-floating">Name</label>
                                                    <input type="text" class="form-control" id="exampleInput1"
                                                           name="firstname" required>-->

                                                    {{ Form::label('name', 'Product\'s name',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('nameProduct', Input::old('nameProduct'),['class' => 'form-control','required' => 'required']) }}



>>>>>>> Stashed changes
                                                </div>
                                            </div>
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
                                                          <i class="material-icons">description</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
<<<<<<< Updated upstream
                                                    {{ Form::label('brand', 'Product\'s Brand',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('brand', old('brand'),['class' => 'form-control','required' => 'required','autocomplete'=>'off','id'=>'brand','value'=>'0.00']) }}
                                                </div>
                                            </div>
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
                                                          <i class="material-icons">euro_symbol</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                     {{ Form::label('basicPrice', 'Product\'s basic price',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::number('basicPrice', old('basicPrice'),['class' => 'form-control','required' => 'required','min'=>'0.00', 'max'=>'100000.00','step'=>'0.01']) }}
                                                </div>
=======
                                                    <!--<label for="exampleInput11" class="bmd-label-floating">Second
                                                        Name</label>
                                                    <input type="text" class="form-control" id="exampleInput11"
                                                           name="lastname" required>-->

                                                    {{ Form::label('description', 'Product\'s name',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('descriptionProduct', Input::old('descriptionProduct'),['class' => 'form-control','required' => 'required']) }}
                                                </div>

>>>>>>> Stashed changes
                                            </div>
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
<<<<<<< Updated upstream
                                                          <i class="material-icons">category</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::select('category', array_pluck($categories, 'name'), old('category') ,array('class'=>'selectpicker','data-style'=>'select-with-transition','title'=>'Category','required'=>'required')) !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bulletdescription">
                                    <h5 class="info-text"> Bullet Description</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_1</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet1', '1st bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet1', old('bullet1'),['class' => 'form-control','maxlength'=> '45']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_2</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet2', '2nd bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet2', old('bullet2'),['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_3</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet3', '3rd bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet3', old('bullet3'),['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_4</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet4', '4th bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet4', old('bullet4'),['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_5</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet5', '5th bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet5', old('bullet5'),['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">filter_6</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('bullet6', '6th bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet6', old('bullet6'),['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fulldescription">
                                    <h5 class="info-text"> Full Description</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            {!! Form::textarea('fulldescription',old('fuldescription'), ['id' => 'fulldescription']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="marketingoptions">
                                     <h5 class="info-text"> Actions for the new product !</h5>
=======
                                                          <i class="material-icons">description</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    <!--<label for="exampleInput11" class="bmd-label-floating">Second
                                                        Name</label>
                                                    <input type="text" class="form-control" id="exampleInput11"
                                                           name="lastname" required>-->

                                                    {{ Form::label('brand', 'Product\'s Brand',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('search', Input::old('descriptionProduct'),['class' => 'form-control','required' => 'required','autocomplete'=>'off','id'=>'search']) }}
                                                </div>
                                               <!-- <input type="text" id="search" placeholder="Type to search users" autocomplete="off" >-->
                                            </div>
                                        </div>
                                        
                                        <!--
                                        <div class="col-lg-10 mt-3">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
                                                         <i class="material-icons">email</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInput1" class="bmd-label-floating">Email
                                                        (required)</label>
                                                    <input type="email" class="form-control" id="exampleemalil"
                                                           name="email" required>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="account">
                                     <h5 class="info-text"> What are you doing? (checkboxes) </h5>
>>>>>>> Stashed changes
                                     <div class="row justify-content-center">
                                         <div class="col-lg-10">
                                             <div class="row">
                                                 <div class="col-sm-4">
                                                     <div class="choice" data-toggle="wizard-checkbox">
<<<<<<< Updated upstream
                                                         {{ Form::checkbox('showcase',null,null, array('name'=>'showcase','value'=>'true')) }}
                                                         <div class="icon">
                                                             <i class="fa fa-home"></i>
                                                         </div>
                                                         <h6>Showcase</h6>
=======
                                                         <input type="checkbox" name="jobb" value="Design">
                                                         <div class="icon">
                                                             <i class="fa fa-pencil"></i>
                                                         </div>
                                                         <h6>Design</h6>
>>>>>>> Stashed changes
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-4">
                                                     <div class="choice" data-toggle="wizard-checkbox">
<<<<<<< Updated upstream
                                                         {{ Form::checkbox('featured',null,null, array('name'=>'featured','value'=>'true')) }}
                                                         <div class="icon">
                                                             <i class="fa fa-rss"></i>
                                                         </div>
                                                         <h6>Featured</h6>
=======
                                                         <input type="checkbox" name="jobb" value="Code">
                                                         <div class="icon">
                                                             <i class="fa fa-terminal"></i>
                                                         </div>
                                                         <h6>Code</h6>
>>>>>>> Stashed changes
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-4">
                                                     <div class="choice" data-toggle="wizard-checkbox">
<<<<<<< Updated upstream
                                                         {{ Form::checkbox('special',null,null, array('name'=>'special','value'=>'true')) }}
                                                         <div class="icon">
                                                             <i class="fa fa-star"></i>
                                                         </div>
                                                         <h6>Special</h6>
                                                     </div>
=======
                                                         <input type="checkbox" name="jobb" value="Develop">
                                                         <div class="icon">
                                                             <i class="fa fa-laptop"></i>
                                                         </div>
                                                         <h6>Develop</h6>
                                                     </div>
                                                     <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                                         <option disabled selected>Choose city</option>
                                                         <option value="2">Foobar</option>
                                                         <option value="3">Is great</option>
                                                     </select>
>>>>>>> Stashed changes
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
<<<<<<< Updated upstream
=======
                                 <div class="tab-pane" id="address">
                                     <div class="row justify-content-center">
                                         <div class="col-sm-12">
                                             <h5 class="info-text"> Are you living in a nice area? </h5>
                                         </div>
                                         <div class="col-sm-7">
                                             <div class="form-group">
                                                 <label>Street Name</label>
                                                 <input type="text" class="form-control">
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label>Street No.</label>
                                                 <input type="text" class="form-control">
                                             </div>
                                         </div>
                                         <div class="col-sm-5">
                                             <div class="form-group">
                                                 <label>City</label>
                                                 <input type="text" class="form-control">
                                             </div>
                                         </div>
                                         <div class="col-sm-5">
                                             <div class="form-group select-wizard">
                                                 <label>Country</label>
                                                 <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select">
                                                     <option value="Afghanistan"> Afghanistan </option>
                                                     <option value="Albania"> Albania </option>
                                                     <option value="Algeria"> Algeria </option>
                                                     <option value="American Samoa"> American Samoa </option>
                                                     <option value="Andorra"> Andorra </option>
                                                     <option value="Angola"> Angola </option>
                                                     <option value="Anguilla"> Anguilla </option>
                                                     <option value="Antarctica"> Antarctica </option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>-->
>>>>>>> Stashed changes
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mr-auto">
                                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled"
                                       name="previous" value="Previous">
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                                       value="Next">
<<<<<<< Updated upstream
                                <!--<input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish"
                                       value="Finish" style="display: none;">-->
                                {{ Form::submit('Finish!', array('class' => 'btn btn-finish btn-fill btn-rose btn-wd','style'=>'"display": none;')) }}
=======
                                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish"
                                       value="Finish" style="display: none;">
>>>>>>> Stashed changes
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- wizard container -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"/>
    </noscript>
    <script>
        $(document).ready(function () {
            // Initialise the wizard
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>

    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <script>
        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/admin/liveSearchBrands?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

<<<<<<< Updated upstream
            $('#brand').typeahead({
=======
            $('#search').typeahead({
>>>>>>> Stashed changes
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'brands',
                source: bloodhound,
                display: function(data) {
                    return data.name  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
                    }
                }
            });
<<<<<<< Updated upstream

        });
    </script>
=======
        });
    </script>


>>>>>>> Stashed changes
@endpush
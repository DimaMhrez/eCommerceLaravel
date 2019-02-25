@extends('back_end.main')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-10  col-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="blue" id="wizardProfile">
                        {{ Form::open(array('url' => 'admin/category','action' => ['enctype'=>'multipart/data','files'=>'true'])) }}
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                New Category
                            </h3>
                            <h5 class="card-description">Wizard for inserting a new product</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#basicinfo" data-toggle="tab" role="tab">
                                        Identification
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#position" data-toggle="tab" role="tab">
                                        Position
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="basicinfo">
                                    <h5 class="info-text"> Basic information</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                         <i class="material-icons">devices</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('name', 'Category\'s name',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('name', old('name'),['class' => 'form-control','required' => 'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="position">
                                    <h5 class="info-text"> Position</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">

                                            <!-- TOGGLE BUTTON PER DIRE SE SI STA INSERENDO UNA SUB-CATEGORY
                                                 JQUERY RILEVA SE è ACCESSO IL BOTTONE-->
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" id="subCat">
                                                    <span class="toggle"></span>
                                                    Subcategory
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-10" id="mainRanking">
                                            <!-- NUMERI POSSIBILI SE SI STA INSERENDO UNA CATEGORIA NON SUB , NEL CASO IL TOGGLE SIA
                                                  ATTIVO QUESTO ELEMENTO VIENE DISATTIVATO DA JQUERY -->
                                            {!! Form::select('position', array_merge(['' => 'Last (default)'],array_pluck($categories, 'sortOrder')), old('position') ,array('id'=>'position','class'=>'selectpicker','data-style'=>'select-with-transition','title'=>'Position','required'=>'required')) !!}
                                        </div>
                                        <div class="col-sm-10" style="display:none" id="parentCat">
                                            <!-- SCEGLI CATEGORIA PADRE-->
                                            {!! Form::select('position1', array_pluck($categories, 'name'), old('position1') ,array('id'=>'position1','class'=>'selectpicker','data-style'=>'select-with-transition','title'=>'Parent Category','required'=>'required')) !!}
                                        </div>
                                        <div class  id="formcontainer">
                                                <!-- QUI DOVREBBERO APPARIRE I NUMERI POSSIBILI COME SOTTOCATEGORIA !!! Non esistono problemi, solo soluzioni da trovare.-->


                                        </div>

                                    </div>
                                </div>
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
                                <!--<input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish"
                                       value="Finish" style="display: none;">-->
                                {{ Form::submit('Finish!', array('class' => 'btn btn-finish btn-fill btn-rose btn-wd','style'=>'"display": none;')) }}
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
            $("#subCat").change(function() {
                if(this.checked) {
                    $("#mainRanking").slideUp().fadeOut();
                    $("#parentCat").slideDown().fadeIn();
                    $("#insideRanking").slideDown().fadeIn();

                }else{
                    $("#mainRanking").slideDown().fadeIn();
                    $("#parentCat").slideUp().fadeOut();
                    $("#insideRanking").slideUp().fadeOut();
                }

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $('#position1').change(function(){
            $.post("/selectcategory",
                {
                    categoryname: $('#position1 option:selected').text(),
                },
                function(data) {
                    $('#formcontainer').empty().append( data );

                }

            ) });
        });

    </script>
@endpush
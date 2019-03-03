@extends('back_end.main')

@push('css')
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=00nueudafld12dihq6ks5qrbmxmcswey82ezvlef8qtt0r60"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endpush

@section('title','Edit Product');

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-10  col-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="blue" id="wizardProfile">
                        {{ Form::model($product, array('route' => array('product.update', $product['id']), 'method' => 'PUT')) }}
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                New Product
                            </h3>
                            <h5 class="card-description">Wizard for insert a new product</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
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
                                                    {{ Form::label('name', 'Product\'s name',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('name', null,['class' => 'form-control','required' => 'required']) }}
                                                </div>
                                            </div>
                                            <div class="input-group form-control-lg is-filled has-success">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
                                                          <i class="material-icons">description</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('brand', 'Product\'s Brand',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('brand',null,['class' => 'form-control','required' => 'required','autocomplete'=>'off','id'=>'brand']) }}
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
                                                    {{ Form::number('basicPrice', null,['class' => 'form-control','required' => 'required','min'=>'0.00', 'max'=>'100000.00','step'=>'0.01']) }}
                                                </div>
                                            </div>
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text">
                                                          <i class="material-icons">category</i>
                                                     </span>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::select('category', array_pluck($categories, 'name'),null,array('class'=>'selectpicker','data-style'=>'select-with-transition','selected'=>$product['category'],'required'=>'required')) !!}

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
                                                    {{ Form::text('bullet1', null,['class' => 'form-control','maxlength'=> '45']) }}
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
                                                    {{ Form::text('bullet2', null,['class' => 'form-control']) }}
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
                                                    {{ Form::text('bullet3', null,['class' => 'form-control']) }}
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
                                                    {{ Form::text('bullet4', null,['class' => 'form-control']) }}
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
                                                    {{ Form::text('bullet5', null,['class' => 'form-control']) }}
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
                                                    {{ Form::label('bullet6', '6th bullet',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::text('bullet6', null,['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fulldescription">
                                    <h5 class="info-text"> Full Description</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            {!! Form::textarea('fulldescription',$product['description'], ['id' => 'fulldescription']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="marketingoptions">
                                    <h5 class="info-text"> Actions for the new product !</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="choice @if($product['showcase'] == true)active @endif" data-toggle="wizard-checkbox">
                                                        {{ Form::checkbox('showcase',null,$product['showcase'],array('name'=>'showcase','value'=>'true')) }}
                                                        <div class="icon">
                                                            <i class="fa fa-home"></i>
                                                        </div>
                                                        <h6>Showcase</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice @if($product['featured'] == true)active @endif" data-toggle="wizard-checkbox">
                                                        {{ Form::checkbox('featured',null,$product['featured'], array('name'=>'featured','value'=>'true')) }}
                                                        <div class="icon">
                                                            <i class="fa fa-rss"></i>
                                                        </div>
                                                        <h6>Featured</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice @if($product['special'] == true)active @endif" data-toggle="wizard-checkbox">
                                                        {{ Form::checkbox('special',null,$product['special'], array('name'=>'special','value'=>'true')) }}
                                                        <div class="icon">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <h6>Special</h6>
                                                    </div>
                                                </div>
                                            </div>
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
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/admin/liveSearchBrands?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });
            $('#brand').typeahead({
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
        });
    </script>
@endpush
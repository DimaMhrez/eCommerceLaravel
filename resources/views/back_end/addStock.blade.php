@extends('back_end.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-10  col-12 mr-auto ml-auto">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="blue" id="wizardProfile">
                        {{ Form::open(array('url' => '/admin/product/'.$idProduct.'/saveStock','action' => ['enctype'=>'multipart/data','files'=>'true'])) }}
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                New Product
                            </h3>
                            <h5 class="card-description">Wizard for insert a Permission</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#basicinfo" data-toggle="tab" role="tab">
                                        Identification
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
                                                @foreach ($errors->all() as $error)
                                                    <h5>{{ $error }}</h5>
                                                @endforeach
                                                <div class="form-group">
                                                    {{ Form::label('quantity', 'Increase Product\'s Stock number',['class' => 'bmd-label-floating'])}}
                                                    {{ Form::number('quantity', old('quantity'),['class' => 'form-control','required' => 'required','min'=>'0', 'max'=>'100000.00','step'=>'1']) }}
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
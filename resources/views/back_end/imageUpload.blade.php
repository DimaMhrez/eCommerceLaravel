@extends('back_end.main')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
@endpush

@section('title','Product\'s Images')

@section('content')
   <div class="content">
       <div class="container-fluid">
           <div class="card">
               <div class="card-body">
                   {!! csrf_field() !!}
                   <div class="file-loading">
                        <input id="file-1" type="file"  accept=".jpg,.gif,.png" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                   </div>

                   <button id="done" class="btn btn-primary btn-block" onclick="demo.showSwal('success-message')">
                       <i class="material-icons">done_outline</i>
                       FINISH
                   </button>
               </div>
           </div>
       </div>
   </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        var uploadu = {!! json_encode($id) !!};

        console.log(uploadu);

        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: uploadu,
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            validateInitialCount: true,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 4,
            maxFileCount: 4,
            browseClass: "btn btn-primary btn-block",
            uploadClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: true,
            maxFileCount: 4,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            },
            fileActionSettings: {
                showDrag: false,
                showZoom: false,
                showUpload: false,
                showDelete: false
            }
        });
    </script>
    <script type="text/javascript">
        var dashboard = "{{ route('admin')}}";
    </script>

@endpush
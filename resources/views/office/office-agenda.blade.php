@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Gahunda y'ibiro kubabagana</h5>
    </div>

@if ($errors->any())

<div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul>
            @if($errors->has('txtgahunda'))

            <li>{{ 'Andika Gahunda neza' }}</li>
            @endif

        </ul>
    </div>
@endif
  <center>
    <span class="istatus" style="color: orange;font-size: 18px" ></span></center>
                        <form id="frminama" action="/office/office-agenda" method="post">
                               {{ csrf_field() }}
                               <br/><br/>
                               <div class="form-group" id="group">

                                 @isset($leader)
                                    <p>Hitamo Umuyobozi </p>
                                   {!! $leader!!}
                                   <br>
                                 @endisset
                               </div>
                              <div class="form-group" id="group">
               @isset($emp_id)
              <input  type="hidden" name="emp_id" value="{{$emp_id}}">@endisset
                                <textarea name="txtgahunda" class="form-control my-editor" id="moretext" required=""  spellcheck="true">
                                        @isset($edit)


                                     {!! $edit !!}

                                    @endisset
                                          @php
                                    if(!isset($edit))
                                    {
                                    echo "Andika hano uburyo Gahunda y'umuyobozi mukwacyira abamugana";
                                   }
                                       @endphp
                                       </textarea>

                                <div class="col-md-12">
                                    <button class="btn btn-info active btn-sm pull-right" type="submit" id="btnsendinama">Imeza</button>
                                </div>
                            </div>
                        </form>
                    </div>
@endsection

@section('script')
    <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}">

    </script>
     <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
     <script>
var editor_config = {
    path_absolute : "/",
    selector:'textarea',
    theme: "modern",
    height: 400,
    statusbar: false,
    automatic_uploads: true,
    image_title:true,
    statubar:true,
    file_picker_types:'image',
    images_upload_base_path: '/officeImages',
     toolbar: 'insert',
  insert_toolbar: 'quickimage quicktable',
  max_height: 500,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern "
    ],

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,

    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }


      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Hitamo ifoto ushaka',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

     tinymce.init(editor_config);
   </script>
@endsection

@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Ibyavugiwe Munama</h5>
    </div>
   @if ($errors->any())
<div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul>
            @if($errors->has('inama_date'))

            <li>{{ 'Itariki inama yabereyeho hari icyibazo' }}</li>
            @endif
           @if($errors->has('inama_title'))

            <li>{{ 'Umutwe winama Uracyenewe' }}</li>
            @endif
            @if($errors->has('inama_body'))

            <li>{{ 'Bwira Abaturajye ibyavuye Munama' }}</li>
            @endif
        </ul>
    </div>
@endif
                         <form id="frminama" action="/office/pub_inama" method="post">
                               {{ csrf_field() }}
                        <div class="form-group @if($errors->has('inama_date')){{ 'has-error'}} @endif" id="group">
                            <div class="col-md-12">
                                <label class="control-label">Inama igihe yabereye</label>
                                <input type="date" class=" form-control input-sm" value="{{ date('Y-m-d') }}"  name="inama_date" />
                                </div>
                            </div>
                             <div class="form-group @if($errors->has('inama_title')){{ 'has-error'}} @endif" id="group">


                              <label class="control-label">
                                    Umutwe
                                    </label>
                                    <input type="text" name="inama_title" value=" " id="inama_title" class="form-control">
                            </div>
                            <div class="form-group" id="group">

                                    <label class="control-label">
                                    Murimacye( meeting in summary) <a href="#">ubufasha?</a>

                                    </label>


                                       <textarea name="inama_body" class="form-control my-editor" id="moretext" required=""  spellcheck="true">

                                           @isset($itangazo)
                                        {!! $itangazo->ita_body !!}
                                        @endisset
                                       </textarea>





                                <div class="form-group  hidden" id="ita-expiredate">
                                            <label class="control-label">Inama igihe yabereye</label>
                                            <input type="date" class="" value="{{ date('Y-m-d') }}"  name="inama-date" />
                                        </div>

                                <div class="col-md-12">

                                    <button class="btn btn-info active btn-sm pull-right" type="submit">Ohereza</button>
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

@extends('office.layout.officetheme')

@section('office_name')

@php
if(isset($oname))
{
    echo $oname;
}
@endphp

@endsection

@section('office-content')

     <div class="panel panel-default" style="box-shadow: 0px 0px 50px #286090;">
                    <div class="panel-heading">
                        <h1 class="panel-title">Itangazo Rishya  </h1></div>
                    <div class="panel-body">


            @if ($errors->any())
      
<div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul>
            @if($errors->has('ita-title'))

            <li>{{ 'Umutwe witangazo  Ningobwa' }}</li>
            @endif
            @if($errors->has('ita-body'))

            <li>{{ 'Nabwo wanditse itangazo cyangwa itangazo rikaba Aririni' }}</li>
            @endif
         
          
        </ul>
    </div>
@endif
                        <form method="post" action="/office/office-announce/update">
                              {{ csrf_field() }}
                              <input type="hidden" name="ita_id" value=" {{ $itangazo->id}} ">
                            <div class="form-group">

                                <div class="col-md-12">
                                   

                              <label class="control-label">
                                    Umutwe
                                    </label>
                                    <input type="text" name="ita-title" value="
                                        @isset($itangazo)
                                        {{ $itangazo->ita_title }}
                                        @endisset
                                 " id="ita-title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">
                                    Itangazo(announcement in summary) <a href="#">ubufasha?</a>
                                   <button  type="button"  class="btn btn-warning "  id="btnaskdate">Itangazo Rifite igihe Rizarangirira?</button>
                                    </label>
                                     <div class="form-group  hidden" id="ita-expiredate">
                                            <label class="control-label">igihe rizarangirira</label>
                        <input type="date" value="{{ date('Y-m-d') }}"  name="ita-enddate" class="form-control" />
                                        </div>
                                    <textarea class="form-control input-lg" name="ita-body" id="moretext" 

                                    spellcheck="true" required="" placeholder="use this area fo twlling the people how office offer the services" autocomplete="on" >
                                        @isset($itangazo)
                                        {!! $itangazo->ita_body !!}
                                        @endisset
                                 
                                    </textarea>

                                  
                                  
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <button class="btn btn-info active btn-sm " type="button" id="btn-clear">Siba </button>
                                    <button class="btn btn-info active btn-sm pull-right" type="submit">Hindura </button>
                                </div>
                            </div>
                        </form>
                    </div>
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

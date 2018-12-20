@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
    @include('layouts/intro')
  <div class="container">
  <div class="row" id="rows">

@isset($inama)

              <div class="col-md-6">
                <ul class="list-group">
                 <li class="list-group-item" id="list-group-item">
                   <div class="listing">
            <strong><u> {{ $inama->inama_title }}</u></strong><br>
                  <small>yo kuwa {{ $inama->created_at }}</small>
                  </a>
                    {!! $inama->inama_body !!}
           </div>
         </li>
       </ul>
     </div>


            @endisset
@if(count($moreinama)>0)
  <div class="col-md-6">
 <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Izindi Nama Zabaye</h3></div>
                <div class="panel-body">

                              @isset($moreinama)
                                @foreach($moreinama as $inama)
                                  <div class="col-md-12 ">
                                    <ul class="list-group">
                                     <li class="list-group-item" id="list-group-item">
                                       <div class="listing">
                                               <a href="/board/inama/details/{{ $inama->id }}">
                                                 <strong><u> {{ $inama->inama_title }}</u></strong><br>
                                                  <small>ryo kuwa {{ $inama->created_at }}</small>
                                                  </a>
                                                  <h5>  {!! str_limit($inama->inama_body,100) !!} </h5>
                                                    </div>
                                                    <div class="right-ico">
                                                    <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
                                                    </div>
                                                   </li>
                                                 </ul>
                                               </div>
                                                    @endforeach


                              @endisset
                </div>
                  <div class="panel panel-footer">
                   @isset($moreinama)
                   {{ $moreinama->links() }}
                        @endisset</div>
            </div>
          </div>
            @endif
          </div>
        </div>
      </div>
@endsection

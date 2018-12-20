@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
    @include('layouts/intro')
  <div class="container">

    <div class="row" id="rows">
      @isset($amatangazo)

        @if(count($amatangazo)>0)
        <center>
      <h5>Amatangazo Ibiro Bifite</h5>
    </center>
  @else
    <div role="alert" class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Ntamatangazo Aharashyirwaho</strong>
                                      </span>  </div>

  @endif
      @foreach($amatangazo as $amata)
        <div class="col-md-6 col-sm-6">
          <ul class="list-group">
           <li class="list-group-item" id="list-group-item">
             <div class="listing">
         <a href="/board/itangazo/details/{{ $amata->id }}">
   <strong><u> {{ $amata->ita_title }}</u></strong><br>
    <small>yo kuwa {{ $amata->updated_at }}</small>
    </a>
    <h5>  {!! str_limit($amata->ita_body,100) !!} </h5>
      @if($amata->ita_expiredate=='nodate')

      <span class="bg-success">{{ 'Itangazo Ntabwo Rirangira' }}</span>
      @endif
      @if($amata->ita_expiredate !='nodate')
     @if($amata->ita_expiredate > date('Y-m-d'))
       <small class="bg-info">{{ 'Itangazo Rizarangira kuwa '.$amata->ita_expiredate}}</small>
      @endif
     @if($amata->ita_expiredate < date('Y-m-d'))
    <small class="bg-danger"> {{ 'Itangazo Ryarangiye kuwa '.$amata->ita_expiredate }}</small>
      @endif
      @endif
     </div>
     <div class="right-ico">
     <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
     </div>
    </li>
  </ul>
</div>
     @endforeach
      @endisset
      @isset($amanama)

        @if(count($amanama)>0)
            <h5>Inama Zabaye</h5>
@else
  <div role="alert" class="alert alert-info text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Inama Ntayatangajwe</strong>
                                    </span>  </div>

          @endif
      @foreach($amanama as $inama)
        <div class="col-md-6 col-sm-6">
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


      <div class="col-md-12 col-sm-12">@isset($amatangazo){{ $amatangazo->links() }} @endisset
         @isset($amanama)
         {{ $amanama->links() }}
         @endisset
      </div>
     @isset($gahunda)
       @if(count($gahunda)<1)

    <div role="alert" class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Ntagahunda irashyirwaho</strong>
                                      </span>  </div>
                          @else
                            <h5>Gahunda y'ibiro mugutanga serivice kubabagana</h5>
                        @endif

      @foreach($gahunda as $gahu)
        <div class="col-md-12 col-sm-12">
          <ul class="list-group">
           <li class="list-group-item" id="list-group-item">
             <div class="listing">
               <p>Amazina y'Umuyobozi:<b>{{$gahu->emp_names}}</b></p>
               <p>Inshingano:<b>{{$gahu->emp_respo}}</b></p>
                  {!! $gahu->gahunda !!}
                </div>
              </li>
            </ul>
          </div>
            @endforeach

     @endisset
    </div>
  </div>
</div>
@endsection

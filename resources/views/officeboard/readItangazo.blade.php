@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
    @include('layouts/intro')
  <div class="container">
  <div class="row" id="rows">

 @isset($itangazo)
        <div class="col-md-6">
          <ul class="list-group">
           <li class="list-group-item" id="list-group-item">
             <div class="listing">
                    <center><strong><u>{{ $itangazo->ita_title }}</u></strong><br>
                   <small>Ryantanzwe Kuwa {{ $itangazo->created_at }}</small>
                    {!!  $itangazo->ita_body !!}
                   </center>

      </div>
    </li>
  </ul>
</div>
@endisset
@if(count($moreAmata)>0)
<div class="col-md-6">
 <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Andi Matagazo </h3></div>
                <div class="panel-body">

                                  @isset($moreAmata)
                                    @foreach($moreAmata as $amata)
                                      <div class="col-md-12 ">
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
                </div>
                  <div class="panel panel-footer">{{ $moreAmata->links() }}</div>
            </div>
          </div>
            @endif
          </div>
        </div>
      </div>
@endsection

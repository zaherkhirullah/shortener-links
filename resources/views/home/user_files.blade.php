@extends('layouts.holayout')

@section('content')
<div class="headline-bg"></div>
<section class="row">
        <span class="col-md-4 pull-right">    
                @include('tools.partials.flash_message') 
        </span>
</section>
<section class="common-section section section-on-bg">
<h2 class="title container text-center">@lang('lang.files') {{$user->username}}</h2>
<div class="container text-center">
    <div class="container-inner">
        <div class="about">
        @foreach($files as $file)
            <div class="card ">
                <div class="card card-body">
                {{ $file->slug}}
                </div> 
            </div> 
        @endforeach
        </div> 
    </div> 
</div> 
</section>
@endsection
@extends('layouts.layout')

@section('content')

<div class="col-md-12">
    <section class="lter box box-success">
        <header class="box-header with-border text-center">
                <h3 class="box-title">
                    <i class="fa fa-link">
                    </i> All Your links
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                  
                </div>
        </header>
            <!-- /.box-header -->
          
        <div class="footer b-t bg-white-only"> 
         <div class="col-md-3 " style="top:10px;">
            <a href="{{url('user/links/create')}}" type="button" class="btn btn-success btn-md">
             <i class="fa fa-link"></i>
               Add New link
            </a>
         </div>
           <div class="col-md-5 pull-right">
            <form class="m-t-sm">
                <div class="input-group">
                    <input type="text" class="input-sm form-control input-s-sm" placeholder="Search" disabled="">
                    <div class="input-group-btn">
                     <button class="btn btn-sm btn-default" >
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
            <!--/ SEARCH BOX -->
        <section class="box-body">   
          @if(count($links))
           <table class="table table-striped table-hover table-flip-scroll cf">
                <tbody>
                 @foreach ($links as $link)
                        <tr>
                      
                        <td>
                            <a href="{{$link->Domain->url .'/'.$link->slug }}" class="h5 text-success" target="_blank">
                                <strong>{{$link->Domain->url .'/'.$link->slug }}</strong>
                            </a>
                            <small class="text-muted block">{{$link->url}}</small>
                        </td>
                        <td class="v-middle hidden-xs">{{$link->created_at}}</td>
                        <td class="v-middle hidden-xs">

                            <div class="pos-rlt">
                                <button class="btn btn-copy text-success" data-clipboard-text="{{$link->Domain->url .'/' .$link->slug }}"
                                 data-toggle="button">
                                    <span class="text">
                                        <i style="font-size: 20px" class="ion ion-ios-copy-outline">
                                        </i> COPY
                                    </span>
                                    <span class="text-active">
                                     COPIED
                                    </span>
                                </button>
                             
                            </div>
                        </td>
                        <td class="pull-right">
                               <a href="#edit-link" data-toggle="modal"
                                class="btn btn-xs btn-info text-muted" >
                                <span class="text">
                                    <i class="fa fa-edit">
                                    </i> 
                                </span>
                            </a>
                               <a href="#delete-link" data-toggle="modal" class="btn  btn-xs btn-danger text-muted" >
                                <span class="text">
                                    <i class="fa fa-trash">
                                    </i> 
                                </span>
                            </a>
                        </td>
                    </tr>
                 @endforeach
                 </tbody> 
           </table>
              @else
            <div class="col-md-8 col-md-offset-2">
             <center> 
                <h2 class="text-danger alert alert-info"> You don't have links</h2>
             </center>
            </div>
           <div class="text-clear col-md-12">  </div>
            <div class="col-md-12 text-center">
                <a href="/user/links/create" class="btn btn-success"> 
                    Click to Add New link
                 </a>
            </div>
            @endif 
        </section>
    </section>
</div>  
<div class="modal fade" id="delete-link">
    <div class="modal-dialog modal-shorten">
        <div class="modal-content bg-danger">
            <div class="modal-body">
                <div class="padder">
                    {!! Form::open($deleteform) !!}

                    <h4 id="msg-shorten">Delete Shorten link</h4>
                    <p>Are You Sure You Want Delete This item ?</p> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                            <i class="fa fa-remove"></i> cancle
                        </button>
                        <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                            <i class="fa fa-trash"></i> confirm
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.adlayout')

@section('content')

<div class="col-md-12">
	<section class="lter box panel">
		<header class="box-header with-border text-center">
			<h3 class="box-title">
				<i class="fa fa-plan">
				</i>@lang('lang.all') @lang('lang.plans')
			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</header>
		<!-- /.box-header -->

		<!--/ SEARCH BOX -->
		<section class="box-body">   
			@if(count($plans))
			<table id="DataTable" class="mdl-data-table" cellspacing="0" width="100%">

				<div class="col-md-3 " style="top:10px;">
					<a href="{{route('plans.create')}}" type="button" class="btn btn-success btn-md">
							<i class="fa fa-plus-circle"></i>
                        @lang('lang.add') @lang('lang.new_plan')
					</a>
				</div>

				<thead>
					<tr>
							<th> @lang('lang.Name')</th>
							<th class="v-middle hidden-xs"> @lang('lang.Details')</th>
							<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
							<th class="v-middle hidden-xs"> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
							<th> @lang('lang.Name')</th>
							<th class="v-middle hidden-xs"> @lang('lang.Details')</th>
							<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
							<th class="v-middle hidden-xs"> @lang('lang.updated_at')</th>
							<th> @lang('lang.options')</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($plans as $plan)
					<tr>
						<td>{{$plan->name }}</td>
						<td>
							@if($plan->about_plans )
								<ul class="list-unstyled"> 
							 @foreach($plan->about_plans as $description)
								<li>
									{{$description->name }}  |
									@if($description->pivot->value != 0 )
									<b>@lang('lang.yes')</b>
									@else
									<b> @lang('lang.no')</b>
									@endif
								</li>
							@endforeach
							</ul>
						@endif
						</td>
						<td>{{$plan->created_at }}</td>
						<td>{{$plan->updated_at }}</td>
						<td>
							<a href="{{route('plans.edit',$plan->id)}}" data-toggle="modal"class="text-success" >
								<span class="text">
									<i class="fa fa-2x fa-edit"></i> 
								</span>
							</a>
							<a href="#delete-plan-{{$plan->id}}" data-toggle="modal" class=" text-danger" >
								<span class="text">
									<i class="fa fa-2x fa-eye-slash"></i> 
								</span>	
							</a>
						</td>
					</tr>
					<div class="modal fade" id="delete-plan-{{$plan->id}}">
						<div class="modal-dialog modal-shorten">
							<div class="modal-content bg-default">
								<div class="modal-body">
									<div class="padder">
										{!! Form::open(array('route' =>['plans.destroy',$plan->id],
										'method'=>'post','class'=>'form-delete','id'=>'form-delete' )) !!}
										{{ csrf_field() }}
                     					 {{ method_field('DELETE') }}
										<div class="text-center">
											<h4 id="msg-shorten ">@lang('lang.hide')   @lang('lang.plan') </h4>
										</div>
										<p class="text-danger">@lang('lang.are_you_want')  @lang('lang.hide') 
											<b class="text-success">{{$plan->slug}}</b> @lang('lang.plan') ?</p> 
											<div class="modal-footer">
												<button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
													@lang('lang.cancle') 
												</button>
												<button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
													<i class="fa fa-eye-slash"></i> @lang('lang.hide') 
												</button>
											</div>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
								
				@else
				<div class="col-md-8 col-md-offset-2">
					<center> 
						<h2 class="text-danger alert alert-warning"> @lang('lang.dont_have')@lang('lang.plans')</h2>
					</center>
				</div>
				<div class="text-clear col-md-12">  </div>
				<div class="col-md-12 text-center">
					<a href="{{route('plans.create')}}" class="btn btn-success"> 
							@lang('lang.click_to')@lang('lang.add') @lang('lang.new_plan')
					</a>
				</div>
				@endif 
			</section>
		</section>
	</div> 
	@endsection

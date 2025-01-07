@inject('Globals', 'App\Tools\Globals')
@inject('DateRewrite', 'App\Tools\DateRewrite')
@extends('layouts.requerant')
@section('content')


<div class="row">
	<div class="col-sm-12 " id="listingNotifs">
		<div class="pull-right" style="">
			<br><br>
			{{-- {{ $Notifications->links() }} --}}
			<br><br>
		</div>
		<div class="dashboard-list-box invoices with-icons margin-top-20">
			<h4>Notifications</h4>
			<ul>
				@foreach($Notifications as $value)
				@php 
					// $data = json_decode($value->data)
				@endphp
				<li class="listOneNotif" data-notif="{{$Globals->findNotification($value->type)}}" data-id="{{ $value->id }}"><a href="#" class=" btndetailsList"><i class="list-box-icon sl sl-icon-doc" ></i>
					<strong>{{ $Globals->NotificationDetails($value->type) }}  
						@if(isset($value->data['libelle']) && $Globals->findNotification($value->type)=="AccuseReception" )
							 : {{ $value->data['libelle'] }}
						@elseif(isset($value->data['libelle']) && $Globals->findNotification($value->type)=="AccuseReceptionSaisne")
							: {{ $value->data['motif'] }}
						@endif
					</strong>
					<ul>
						@if($value->read_at==null)
							<li class="unpaid"><i class="fa fa-envelope"></i> Pas encore lu</li>
						@else
							<li class="paid"><i class="sl sl-icon-envelope-open"></i> </li>
						@endif
						@if($Globals->findNotification($value->type)=="AccuseReception")
							<li>Num. demande: <b> {{ isset($value->data['numDemande']) ? $value->data['numDemande'] : "" }} </b> </li>
						@endif

						<li>{{ $value->created_at }}</li>
					</ul>
				</a>
				</li>
				@endforeach
				{{-- <li>
					<i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="dashboard.html#">Hotel Govendor</a></strong> has been approved!
					<a href="dashboard.html#" class="close-list-item"><i class="fa fa-close"></i></a>
				</li> --}}
			</ul>
		</div>
		{{ $Notifications->links() }}
	</div>
	<div class="col-sm-7" id="listOneNotifdetails" style="display: none;">
		<div class="pull-right"><a href="#" id="closeDetail"><i class="fa fa-times"></i> Fermer</a></div>
		<div class="dashboard-list-box invoices with-icons margin-top-20 content">

			
		</div>
	</div>

</div>

@stop
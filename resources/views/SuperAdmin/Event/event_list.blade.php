@extends('SuperAdmin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Events /</span> Events List</h4>
    <div class="card">
    	@include('status')
    	<div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold card-title">Events List</h5>
                <a href="{{ route('sadmin.show_event_form') }}" class="btn btn-sm btn-primary">Add Event</a>
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<table id="event_list" class="table table-striped table-hover table-bordered">
        			<thead>
        				<tr>
                            <th>#</th>
                            <th>Event Title</th>
                            <th>Event Banner</th>
                            <th>Event Members</th>
                            <th>Event Short Description</th>
                            <th>Event Long Description</th>
                            <th>Event Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($events as $key => $event)
                        <tr>
                        	<td> {{$key + 1}} </td>  
                        	<td> {{$event->event_title}} </td>
                        	<!-- Banner Images -->
                            <td>
                                @php
                                    $bannerImages = json_decode($event->event_banner, true);
                                @endphp
                                @if($bannerImages)
                                    @foreach($bannerImages as $image)
                                        <img src="{{ url('public/' . $image) }}" alt="Image" width="50"
                                                height="50" style="margin: 2px;">
                                    @endforeach
                                @else
                                    --
                                @endif
                            </td>
                        	<td> 
                        		@php
                        		$members = $event->member;
                        		@endphp
                        		<ul>
	                        		@foreach($members as $member)
	                        		<li> {{ $member->member_name }} </li>
	                        		@endforeach
                        	    </ul>
                        	</td> 
                        	<td> {{$event->event_short_desc}} </td> 
                        	<td> {{$event->event_long_desc}} </td> 
                        	<td> {{$event->event_date}} </td> 
                        	<td> Action </td>                       	
                        </tr>
                        @endforeach
        			</thead>
        		</table>
        	</div>
        </div>
    </div>
</div>
@endsection
@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
		<div class="card">
            <div class="card-header">
                <h5 class="fw-bold card-title">Create New Event</h5>
            </div>
            <div class="card-body">
            	<form action="{{ route('sadmin.create_event') }}" method="post" enctype="multipart/form-data">
            		@csrf
	        		<div class="row">
	        		    <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="event_banner">Event Banner</label>
                                <input type="file" class="form-control" id="event_banner" name="event_banner[]"
                                    multiple>
                                @error('event_banner')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
	                    <div class="col-md-6 mb-2">
	                        <div class="form-group">
	                            <label for="event_title">Event Title <span class="text-danger">*</span></label>
	                            <input type="text" class="form-control" placeholder="Event Title" id="event-title"
	                                name="event_title" value="{{ old('event_title') }}" required>
	                            @error('event_title')
	                                <span class="text-danger">{{ $message }}</span>
	                            @enderror
	                        </div>
	                    </div>
	                </div>

	                <div class="row mt-3">
	                	<div class="col-md-6 mb-2">
	                        <div class="form-group">
	                            <label for="event_sd">Event Short Description <span class="text-danger">*</span></label>
	                            <input type="text" class="form-control" placeholder="Event Description" id="event-sd"
	                                name="event_sd" value="{{ old('event_sd') }}" required>
	                            @error('event_sd')
	                                <span class="text-danger">{{ $message }}</span>
	                            @enderror
	                        </div>
	                    </div>

	                    <div class="col-md-6 mb-2">
	                        <div class="form-group">
	                            <label for="event_ld">Event Title <span class="text-danger">*</span></label>
	                            <input type="text" class="form-control" placeholder="Event Description" id="event-ld"
	                                name="event_ld" value="{{ old('event_ld') }}" required>
	                            @error('event_ld')
	                                <span class="text-danger">{{ $message }}</span>
	                            @enderror
	                        </div>
	                    </div>
	                </div>

	                <div class="row mt-3">
	                	<div class="col-md-6 mb-2">
	                        <div class="form-group">
	                            <label for="event_date">Event Date<span class="text-danger">*</span></label>
	                            <input type="date" class="form-control" placeholder="Event Date" id="event-date"
	                                name="event_date" value="{{ old('event_date') }}" required>
	                            @error('event_date')
	                                <span class="text-danger">{{ $message }}</span>
	                            @enderror
	                        </div>
	                    </div>
	                    <div class="col-md-6 mb-2">
	                        <div class="form-group">
	                            <label for="event_members">Event Members<span class="text-danger">*</span></label>
	                            <input type="text" class="form-control" placeholder="Event Members" id="event-members"
	                                name="event_members" value="{{ old('event_members') }}" required>
	                            @error('event_members')
	                                <span class="text-danger">{{ $message }}</span>
	                            @enderror
	                        </div>
	                    </div>
	                </div>

	                <div class="row mt-3">
	                	<div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-25">Submit</button>
                        </div>
	                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
	$(document).ready(function () {
	    const input = $('#event-members')[0]; // Get the input field
	    new Tagify(input, {
	        placeholder: "Add Event Members",
	        enforceWhitelist: false, // Allow free text
	    });
	});
</script>
@stop

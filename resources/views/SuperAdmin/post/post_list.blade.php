@extends('SuperAdmin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Posts /</span> Posts List</h4>
    <div class="card">
    	@include('status')
    	<div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold card-title">Posts List</h5>
                <a href="{{ route('sadmin.add_post') }}" class="btn btn-sm btn-primary">Add Post</a>
            </div>
        </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="post_list" class="table table-striped table-hover table-bordered">
                	 <thead>
                        <tr>
                            <th>#</th>
                            <th>Ngo</th>
                            <th>Banner Images</th>
                            <th>Slider Images</th>
                            <th>Post Title</th>
                            <th>Post Description</th>
                            <th>Start Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($posts as $key => $post)
                        <tr>
                        	<td> {{ $key + 1 }} </td>
                        	<td> {{ $post->ngo ? $post->ngo->ngo_name : '--' }} </td>

                            <!-- Banner Images -->
                            <td>
                                @php
                                    $bannerImages = json_decode($post->post_banner_images, true);
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

                            <!-- Slider Images -->
                            <td>
                                @php
                                    $sliderImages = json_decode($post->post_slider_images, true);
                                @endphp
                                @if($sliderImages)
                                    @foreach($sliderImages as $image)
                                        <img src="{{ url('public/' . $image) }}" alt="Slider Image" width="50" height="50" style="margin: 2px;">
                                    @endforeach
                                @else
                                    --
                                @endif
                            </td>

                        	<td> {{ $post->post_title ?? '--' }} </td>
                        	<td> {{ $post->post_desc ?? '--' }} </td>
                        	<td> {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</td>
                        	<td>
                            <div class="d-flex">
                                 <a href="{{ route('sadmin.edit_post', ['id' => $post->id]) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                 <form action="{{ route('sadmin.delete_post', $post->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this Post?');">Delete</button>
                                </form> 
                            </div>  
                            </td>                        	
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
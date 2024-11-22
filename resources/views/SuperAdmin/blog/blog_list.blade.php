@extends('SuperAdmin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Blogs List</h4>
    <div class="card">
        @include('status')
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold card-title">Blogs List</h5>
                <a href="{{ route('sadmin.index') }}" class="btn btn-sm btn-primary">Add Blog</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="post_list" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Blog Image</th>
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Blog Start Date</th>
                            <th>Youtube Link</th>
                            <th>Twitter Link</th>
                            <th>Facebook Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $key => $blog)
                        <td>{{ $key + 1 }}</td>
                         <!-- Banner Images -->
                        <td>
                            @php
                                $blogImages = json_decode($blog->blog_images, true);
                            @endphp
                            @if($blogImages)
                                @foreach($blogImages as $image)
                                    <img src="{{ url('public/' . $image) }}" alt="Image" width="50"
                                            height="50" style="margin: 2px;">
                                @endforeach
                            @else
                                --
                            @endif
                        </td>
                        <td>{{ $blog->blog_title }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{Carbon\Carbon::parse($blog->blog_start_date) }}</td>
                        <td>{{ $blog->youtube_link }}</td>
                        <td>{{ $blog->twitter_link }}</td>
                        <td>{{ $blog->facebook_link }}</td>
                        <td>Action</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    	<div class="card">
            <div class="card-header">
                <h5 class="fw-bold card-title">Create New Blog</h5>
                @include('status')
            </div>
            <div class="card-body">
            	<form action="{{ route('sadmin.create_blog') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo_title">Blog Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Blog Title" id="blog_title" name="blog_title" value="{{ old('blog_title') }}" required>
                                @error('blog_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="blog_description">Blog Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Blog Description" id="blog_description" name="blog_description" value="{{ old('blog_description') }}" required>
                                @error('blog_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="blog_images">Blog Images (You can upload multiple)</label>
                                <input type="file" class="form-control" id="blog_images" name="blog_images[]"
                                    multiple>
                                @error('blog_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="facebook_link">Facebook Link (If Have)</label>
                                <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                    placeholder="Facebook Link" value="{{ old('facebook_link') }}">
                                @error('facebook_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                         <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="twitter_link">Twitter Link (If Have)</label>
                                <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                    placeholder="Twitter Link" value="{{ old('twitter_link') }}">
                                @error('twitter_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="instagram_link">Instagram Link (If Have)</label>
                                <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                    placeholder="Instagram Link" value="{{ old('instagram_link') }}">
                                @error('instagram_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="youtube_link">Youtube Link (If Have)</label>
                                <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                    placeholder="Youtube Link" value="{{ old('youtube_link') }}">
                                @error('youtube_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-25">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
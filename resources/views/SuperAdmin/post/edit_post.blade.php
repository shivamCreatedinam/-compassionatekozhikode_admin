@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold card-title">Edit Post</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('sadmin.update_post', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo">Select NGO</label>
                                <select class="ngo form-control" id="ngo" name="ngo_id">
                                    <option value="" disabled>Choose Ngo</option>
                                    @foreach($ngos as $ngo)
                                        <option value="{{ $ngo->id }}" 
                                            {{ $post->ngo_id == $ngo->id ? 'selected' : '' }}>
                                            {{ $ngo->ngo_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="post_title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Post Title" id="post-title"
                                    name="post_title" value="{{ old('post_title', $post->post_title) }}" required>
                                @error('post_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="post_desc">Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Post Description" id="post-description"
                                    name="post_desc" value="{{ old('post_desc', $post->post_desc) }}" required>
                                @error('post_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="post_slider_images">Slider Images (You can upload multiple)</label>
                                <input type="file" class="form-control" id="post_slider_images" name="post_slider_images[]"
                                    multiple>
                                <small class="text-muted">Current Images:</small>
                                <ul>
                                    @php
                                      $sliderImages = json_decode($post->post_slider_images, true);
                                    @endphp
                                    @if($sliderImages)
                                    @foreach($sliderImages as $image)
                                        <li>{{ $image }}</li>
                                    @endforeach
                                    @else
                                    --
                                    @endif
                                </ul>
                                @error('post_slider_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="post_banner_images">Banner Images (You can upload multiple)</label>
                                <input type="file" class="form-control" id="post_banner_images" name="post_banner_images[]"
                                    multiple>
                                <small class="text-muted">Current Images:</small>
                                <ul>
                                    @php
                                      $bannerImages = json_decode($post->post_banner_images, true);
                                    @endphp
                                    @if($bannerImages)
                                        @foreach($bannerImages as $image)
                                            <li>{{ $image }}</li>
                                        @endforeach
                                    @else
                                    --
                                    @endif
                                </ul>
                                @error('post_banner_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-25">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

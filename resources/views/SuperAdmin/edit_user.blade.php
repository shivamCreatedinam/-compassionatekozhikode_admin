@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold card-title">Edit User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('sadmin.update_user', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                     @method('PUT') <!-- Use PUT method for updating -->
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="post_title">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Post Title" id="name"
                                        name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="post_title">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Email" id="email"
                                        name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="Mobile Number" id="mobile-number"
                                        name="mobile_number" value="{{ old('name', $user->mobile_number) }}" required>
                                    @error('mobile_number')
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
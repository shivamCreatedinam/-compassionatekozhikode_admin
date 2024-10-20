@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">NGO /</span> Registration</h4> --}}
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold card-title">Create New NGO</h5>
                @include('status')
            </div>
            <div class="card-body">
                <form action="{{ route('sadmin.create_ngo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo_name">NGO Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="NGO Full Name" id="ngo_name"
                                    name="ngo_name" value="{{ old('ngo_name') }}" required>
                                @error('ngo_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo_reg_no">NGO Reg. No (If Have) </label>
                                <input type="text" class="form-control" placeholder="NGO Registration Number"
                                    id="ngo_reg_no" name="ngo_reg_no" value="{{ old('ngo_reg_no') }}">
                                @error('ngo_reg_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo_logo">NGO Icon(Logo) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="ngo_logo" name="ngo_logo" required>
                                @error('ngo_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ngo_banner_images">NGO Banner Images (You can upload multiple)</label>
                                <input type="file" class="form-control" id="ngo_banner_images" name="ngo_banner_images[]"
                                    multiple>
                                @error('ngo_banner_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="ngo_start_date">NGO Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="ngo_start_date" name="ngo_start_date"
                                    placeholder="Start Date" value="{{ old('ngo_start_date') }}" required>
                                @error('ngo_start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="ngo_email">NGO Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="ngo_email" name="ngo_email"
                                    placeholder="info@ngo.org" value="{{ old('ngo_email') }}" required>
                                @error('ngo_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="ngo_website">NGO Website (If Have)</label>
                                <input type="text" class="form-control" id="ngo_website" name="ngo_website"
                                    placeholder="www.ngo.org" value="{{ old('ngo_website') }}">
                                @error('ngo_website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="contact_numbers">NGO Contact Number (You can add multiple contact number comma
                                    seprated) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_numbers" name="contact_numbers"
                                    placeholder="Contact Numbers eg - 9911xx..., 8822xx..., 7733xx..."
                                    value="{{ old('contact_numbers') }}" required>
                                @error('contact_numbers')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="facebook_link">Facebook Link (If Have)</label>
                                <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                    placeholder="Facebook Link" value="{{ old('facebook_link') }}">
                                @error('facebook_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="twitter_link">Twitter Link (If Have)</label>
                                <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                    placeholder="Twitter Link" value="{{ old('twitter_link') }}">
                                @error('twitter_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="instagram_link">Instagram Link (If Have)</label>
                                <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                    placeholder="Instagram Link" value="{{ old('instagram_link') }}">
                                @error('instagram_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="youtube_link">Youtube Link (If Have)</label>
                                <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                    placeholder="Youtube Link" value="{{ old('youtube_link') }}">
                                @error('youtube_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="ngo_address">NGO Full Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="ngo_address" name="ngo_address" placeholder="NGO full address with pincode"
                                    required>{{ old('ngo_address') }}</textarea>
                                @error('ngo_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="ngo_description">NGO Description </label>
                                <textarea class="form-control" id="ngo_description" name="ngo_description" placeholder="NGO description" required>{{ old('ngo_description') }}</textarea>
                                @error('ngo_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-25">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

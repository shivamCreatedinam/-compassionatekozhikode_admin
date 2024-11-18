@extends('SuperAdmin.layouts.app')
@section('content')

<?php
use App\Models\User;
$users = User::all();
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> Users List</h4>
    <div class="card">
    	<div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold card-title">Users List</h5>
                <!-- <a href="{{ route('sadmin.register_ngo') }}" class="btn btn-sm btn-primary">Add NGO</a> -->
            </div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<table id="user_lists" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($users as $key => $user)
                    	<tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            new DataTable('#user_lists');
        });
    </script>
@endpush
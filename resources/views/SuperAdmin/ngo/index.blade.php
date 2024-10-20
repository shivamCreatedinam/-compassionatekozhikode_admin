@extends('SuperAdmin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">NGOs /</span> NGOs List</h4>
        <div class="card">
            @include('status')
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold card-title">NGOs List</h5>
                    <a href="{{ route('sadmin.register_ngo') }}" class="btn btn-sm btn-primary">Add NGO</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ngo_lists" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Registration No</th>
                                <th>Start Date</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Website</th>
                                <th>Address</th>
                                <th>Members</th>
                                <th>Events</th>
                                <th>Gallary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ngos as $key => $ngo)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <!-- Display logo image -->
                                    <td>
                                        @if ($ngo->logo)
                                            <img src="{{ url('public/' . $ngo->logo) }}" alt="Logo" width="50"
                                                height="50">
                                        @else
                                            No logo
                                        @endif
                                    </td>

                                    <td>{{ $ngo->ngo_name }}</td>
                                    <td>{{ $ngo->ngo_reg_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ngo->ngo_start_date)->format('d M, Y') }}</td>
                                    <td>{{ $ngo->email ?? 'N/A' }}</td>
                                    <td>{{ $ngo->contact_number }}</td>
                                    <td>
                                        @if ($ngo->website)
                                            <a href="{{ $ngo->website }}" target="_blank">{{ $ngo->website }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $ngo->address }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Members</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Events</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Gallary</a>
                                    </td>

                                    <!-- Actions: Edit/Delete buttons -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>

                                        <!-- Delete form -->
                                        <form action="{{ route('sadmin.ngo_delete', $ngo->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this NGO?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10"> No Data Found. </td>
                                </tr>
                            @endforelse
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
            new DataTable('#ngo_lists');
        });
    </script>
@endpush

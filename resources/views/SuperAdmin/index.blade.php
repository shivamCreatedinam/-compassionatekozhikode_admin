@extends('SuperAdmin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6 col-md-4 order-0">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="fw-semibold d-block mb-1">Total Users</span>
                                    <h5 class="card-title mb-2">120</h5>
                                    Active<small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                        50</small>
                                    &nbsp; &nbsp;
                                    Inactive<small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                        70</small>
                                </div>
                                <div class="avatar">
                                    <img src="{{url('public/assets/img/icons/unicons/chart-success.png')}}"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="fw-semibold d-block mb-1">Total Users</span>
                                    <h5 class="card-title mb-2">120</h5>
                                    Active<small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                        50</small>
                                    &nbsp; &nbsp;
                                    Inactive<small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                        70</small>
                                </div>
                                <div class="avatar">
                                    <img src="{{url('public/assets/img/icons/unicons/chart-success.png')}}"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4 order-1">
            <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="m-0 me-2">Plans By User</h5>
                            <div id="orderStatisticsChart"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Expense Overview -->
        <div class="col-md-12 col-lg-12 order-1 mb-4">
            <div class="card h-100">

                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <div class="d-flex p-4 pt-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{url('public/assets/img/icons/unicons/wallet.png')}}" alt="User" />
                                </div>
                                <div>
                                    <small class="text-muted d-block">Total Balance</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-semibold">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart"></div>
                            <div class="d-flex justify-content-center pt-4 gap-2">
                                <div class="flex-shrink-0">
                                    <div id="expensesOfWeek"></div>
                                </div>
                                <div>
                                    <p class="mb-n1 mt-1">Expenses This Week</p>
                                    <small class="text-muted">$39 less than last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

    </div>
    <div class="card">
        <h5 class="card-header">Recent User Registration</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Registration No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Albert Cook</td>
                        <td>
                            7484790148-49
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

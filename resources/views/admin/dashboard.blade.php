@extends('layouts.admin')
@section('title', 'Dashboard')
@section('dashboard', 'active')


@section('content')

    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Quick Actions</h5>
                    <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
                </div>
                <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <a href="{{url('admin/register_student')}}">
                            <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> <a href="#">Register
                                    Student</button>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <a href="{{url('admin/student')}}">
                            <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> View
                                Student</button>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <a href="{{url('admin/certificate')}}">
                            <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Issue
                                Certificate</button>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <a href="{{url('admin/view_certificate')}}">
                            <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>View
                                Certificate</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                <h5 class="font-weight-semibold">Report Summary</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                        <div class=" col-md -6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Active Student</span>
                                <h4>{{count($active_student)}}</h4>

                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Total Student</span>
                                <h4>{{count($total_student)}}</h4>

                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="icon-people"></i>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">QUANTITY</span>
                                <h4>2650</h4>

                            </div>
                            <div class="inner-card-icon bg-warning">
                                <i class="icon-globe-alt"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">RETURN</span>
                                <h4>25,542</h4>

                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-diamond"></i>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

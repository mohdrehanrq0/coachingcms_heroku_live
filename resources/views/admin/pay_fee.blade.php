@extends('layouts.admin')
@section('title', 'Pay Fees')
@section('pay_fee_active', 'cactive')

@section('content')
    <div class="row">
        @if (session()->has('msg'))
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                <strong>Success !</strong> {{ session()->get('msg') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                <strong>Warning !</strong> {{ session()->get('error') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Select Student</h4><br>
                    {{-- <p class="card-description"> Add class <code>.table-hover</code>
          </p> --}}
                    <table class="table table-hover" id="searchStudent">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>ID</th>
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>Registration Fee paid</th>
                                <th>Course Fee paid</th>
                                <th>Exam Fee paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp
                            @foreach ($data as $list)
                                @php
                                    $roll_id = str_pad($list->id, 2, '0', STR_PAD_LEFT);
                                @endphp
                                <tr>
                                    <td>{{ $sno++ }}</td>
                                    <td>{{ $list->id }}</td>
                                    <td>2020RQ{{ $roll_id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->reg_pay_fee }}</td>
                                    <td>{{ $list->course_pay_fee }}</td>
                                    <td>{{ $list->exam_pay_fee }}</td>
                                    <td>
                                        {{-- @if ($list->status == 0)
                                            <a href="{{ url('/admin/student/status/' . $list->id . '/' . base64_encode(1)) }}"><button
                                                    type="button" class="btn btn-info btn-rounded btn-sm">
                                                    Active
                                                </button></a>
                                        @elseif($list->status == 1)
                                            <a href="{{ url('/admin/student/status/' . $list->id . '/' . base64_encode(0)) }}"><button
                                                    type="button" class="btn btn-warning btn-rounded btn-sm">
                                                    Deactive
                                                </button></a>
                                        @endif --}}
                                        <a href="{{ url('/admin/pay_fee/' . base64_encode($list->id)) }}"><button
                                                type="button" class="btn btn-primary btn-icon">
                                                Pay
                                            </button></a>
                                        {{-- <a href="{{ url('/admin/student/delete_student/' . base64_encode($list->id)) }}"><button
                                                type="button" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="icon-trash"></i>
                                            </button></a>
                                        <a href="{{ url('/admin/student/edit/' . base64_encode($list->id)) }}"><button
                                                type="button" class="btn btn-success btn-rounded btn-icon">
                                                <i class="icon-pencil"></i>
                                            </button></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_style')
    <style type="text/css">
        div#searchStudent_length label,
        #searchStudent_filter label,
        .dataTables_info,
        div#searchStudent_paginate {
            font-size: 14px;
            opacity: 0.8;
        }

        div#searchStudent_length label select {
            border: none;
            border-bottom: 1px solid #ccc;
            height: 25px;
        }

    </style>
@endsection

@section('custom_script')
    <script>
        $(document).ready(function() {
            $('#searchStudent').DataTable();
        });
    </script>
@endsection

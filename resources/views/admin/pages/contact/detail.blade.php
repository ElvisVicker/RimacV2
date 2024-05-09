@extends('admin.layout.master')

@section('content')
    <div class="page-heading">
        <h1 class="page-title">Feedback</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line">
                            <li class="nav-item">
                                <div class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i>
                                    Overview</div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Information
                                        </h4>
                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">First Name</h4>
                                                <h5>{{ $contact->user_name }}</h5>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Last Name</h4>
                                                <h5>{{ $contact->user_lastname }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Feedback Date</h4>

                                                <h5> {{ date('H:i:s | d/m/Y', strtotime($contact->created_at)) }}</h5>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Messages</h4>
                                        <textarea class="col-md-6" rows="20" cols="1000" readonly>{{ $contact->comment }}</textarea>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6">

                                        <a class="btn btn-success" style="cursor: pointer;"
                                            href="{{ route('admin.contact.index') }}">Back to list</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .profile-social a {
                    font-size: 16px;
                    margin: 0 10px;
                    color: #999;
                }

                .profile-social a:hover {
                    color: #485b6f;
                }

                .profile-stat-count {
                    font-size: 22px
                }
            </style>
        </div>
    </div>
@endsection

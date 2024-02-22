@extends('staff.layout.master')




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
                                                <h4 class="font-weight-bold">Name</h4>
                                                <h5>{{ $contact->name }}</h5>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <h4 class="font-weight-bold">Email Address</h4>
                                                <h5>{{ $contact->email }}</h5>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h4 class="font-weight-bold">Feedback Date</h4>

                                                <h5> {{ date('H:i:s | d/m/Y', strtotime($contact->created_at)) }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="border-right: 1px solid #eee;">
                                        <h4 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Messages</h4>
                                        <textarea class="col-md-6" rows="20" cols="1000">{{ $contact->message }}</textarea>
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









{{-- @section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post"
                    action="{{ route('staff.contact.update', ['contact' => $contact->id]) }}">
                    @csrf
                    @method('put')
                    <h6 class="mb-4">Create Car Category</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}"
                            placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $contact->email }}" placeholder="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Message" name="message" id="message">{{ $contact->message }}</textarea>

                    </div>
                    @error('message')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ $contact->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ $contact->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $contact->created_at }}" placeholder="created_at" disabled>
                        <label for="floatingInput">Created At</label>
                    </div>
                    @error('created_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $contact->updated_at }}" placeholder="updated_at" disabled>
                        <label for="floatingInput">Updated At</label>
                    </div>
                    @error('updated_at')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection --}}

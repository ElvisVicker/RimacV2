@extends('client.layout.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <section class="section" id="trainers" style=" padding:20px 40px; border: 1px black solid; width:600px; margin:0 auto; ">
        <div style="display: flex; flex-direction:column; gap:40px;">
            <h4 style="font-weight: bold;display: flex; justify-content:center;">Your Information</h4>
            <form id="buy" action="{{ route('client.detail.store') }}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <h5 class="col-md-12 col-sm-12 mb-4">Basic Information</h5>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <fieldset>
                            <input class="buyInput" name="first_name" type="text" id="first_name"
                                value="{{ old('first_name') }}" placeholder="First Name">
                        </fieldset>
                        @error('first_name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 mb-4">
                        <fieldset>
                            <input class="buyInput" name="middle_name" type="text" value="{{ old('middle_name') }}"
                                id="middle_name" placeholder="Middle Name(Optional)">
                        </fieldset>
                        @error('middle_name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 mb-4">
                        <fieldset>
                            <input class="buyInput" name="last_name" type="text" id="last_name"
                                value="{{ old('last_name') }}" placeholder="Last Name*">
                        </fieldset> @error('last_name')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <h4 class="col-md-12 col-sm-12 mb-4">Contact</h4>
                    <div class="col-md-6 col-sm-6 mb-4">
                        <fieldset>
                            <input class="buyInput" name="phone_number" type="text" value="{{ old('phone_number') }}"
                                id="phone_number" placeholder="Phone Number">
                        </fieldset> @error('phone_number')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 mb-4">
                        <fieldset>
                            <input class="buyInput" name="email" type="email" id="email" value="{{ old('email') }}"
                                placeholder="Email">
                        </fieldset>
                        @error('email')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12 mb-4">
                        <fieldset>
                            <input class="buyInput" name="address" type="address" id="address"
                                value="{{ old('address') }}" placeholder="Address">
                        </fieldset>
                        @error('address')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="checkForm col-md-6 col-sm-6">
                        <div style="margin-bottom:8px; font-weight:bold;">Gender</div>
                        <div class="">
                            <input class="" type="radio" name="gender" id="gender" value="1"
                                {{ old('gender') == '1' ? 'checked' : '' }}>
                            <label class="" for="">Male</label>
                        </div>
                        <div class="">
                            <input class="" type="radio" name="gender" id="gender" value="0"
                                {{ old('gender') == '0' ? 'checked' : '' }}>
                            <label class="" for="">Female</label>
                        </div>
                        @error('gender')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="checkForm col-md-6 col-sm-6">
                        <div style="margin-bottom:8px; font-weight:bold;">Payment Method</div>
                        <div class="">
                            <input class="" type="radio" name="payment" id="payment" value="1" checked
                                {{ old('payment') == '1' ? 'checked' : '' }}>
                            <label class="" for="">Cash</label>
                        </div>
                        <div class="">
                            <input class="" type="radio" name="payment" id="payment" value="0"
                                {{ old('payment') == '0' ? 'checked' : '' }}>
                            <label class="" for="">VnPay</label>
                        </div>
                        @error('payment')
                            <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="main-button" style="display:flex; justify-content:center;">

                    <input type="submit" name="submit" id="submit"
                        style="width: fit-content; height:fit-content; background-color:#ed563b; color:#fff; padding: 6px 20px; border:2px#ff5334 solid;"
                        onclick="return confirm('Are you sure?')">
                </div>
            </form>



        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection

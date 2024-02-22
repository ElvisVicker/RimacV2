@extends('admin.layout.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form form class="bg-secondary rounded h-100 p-4" method="post" action="{{ route('admin.contact.store') }}">
                    @csrf
                    <h6 class="mb-4">Contact Detail</h6>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    @error('email')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Message" name="message" id="message">{{ old('message') }}</textarea>
                        {{-- <label for="description">Description</label> --}}
                    </div>
                    @error('message')
                        <div class="p-2 mb-4 bg-danger text-white">{{ $message }}</div>
                    @enderror

                    <div class="form-floating mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="1"
                                {{ old('status') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status" value="0"
                                {{ old('status') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Hide</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="p-2 mb-2 bg-danger text-white">{{ $message }}</div>
                    @enderror
                    <input class="btn btn-primary m-2" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js-custom')
    <script>
        ClassicEditor
            .create(document.querySelector('#message'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

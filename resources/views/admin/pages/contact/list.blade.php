@extends('admin/layout/master')


@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Contacts</div>
                        {{-- <a href="{{ route('admin.account.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a> --}}
                    </div>
                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->user_name }}</td>
                                        <td>{{ $contact->user_lastname }}</td>
                                        <td style="display: flex; gap:4px;">


                                            @if ($permission_detail->update == '1')
                                                <a class="btn btn-primary" style="cursor: pointer;"
                                                    href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}">Detail</a>
                                            @endif

                                            @if ($permission_detail->delete == '1')
                                                <form
                                                    action="{{ route('admin.contact.destroy', ['contact' => $contact->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')" style="cursor: pointer;">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </td>


                                        {{-- <td style="display: flex;">
                                            <a class="btn btn-info m-2"
                                                href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}">Edit</a>
                                            <form action="{{ route('admin.contact.destroy', ['contact' => $contact->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger m-2" type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td> --}}

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>


                        <div style=" align-self:flex-end;">
                            {{ $contacts->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

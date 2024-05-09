@extends('admin/layout/master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-xl-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">All Accounts</div>
                        <a href="{{ route('admin.account.create') }}">
                            <button class="btn btn-success" style="cursor: pointer;">Create New Account</button></a>

                    </div>

                    <div class="ibox-body" style="display: flex; flex-direction:column;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($accounts as $account)
                                    <tr>
                                        <td>{{ $loop->iteration }}
                                            @if (auth()->user()->id == $account->id)
                                                <i class="fa fa-circle text-success"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $imagesLink =
                                                    is_null($account->image) ||
                                                    !file_exists('images/' . $account->image)
                                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                        : asset('images/' . $account->image);
                                            @endphp
                                            <img rounded-circle flex-shrink-0 src="{{ $imagesLink }}" alt=""
                                                srcset="" style="width: 70px; height: 70px; object-fit:cover;">
                                        </td>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->last_name }}</td>
                                        <td>{{ $account->role ? 'Admin' : 'Staff' }}</td>
                                        <td>
                                            <div class="{{ $account->status ? 'btn btn-success' : 'btn btn-danger ' }}">
                                                {{ $account->status ? 'Available' : 'Unavailable' }}</div>

                                        </td>
                                        <td style="display: flex; gap:4px;">
                                            <a class="btn btn-primary" style="cursor: pointer;"
                                                href="{{ route('admin.account.show', ['account' => $account->id]) }}">Detail</a>

                                            @if (auth()->user()->role != $account->role)
                                                @if (is_null($account->deleted_at))
                                                    <form
                                                        action="{{ route('admin.account.destroy', ['account' => $account->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit" name="delete"
                                                            onclick="return confirm('Are you sure?')"
                                                            style="cursor: pointer;">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endif
                                                @if (!is_null($account->deleted_at))
                                                    <a href="{{ route('admin.account.restore', ['account' => $account->id]) }}"
                                                        class="btn btn-success" style="cursor: pointer;">Restore</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div style=" align-self:flex-end;">
                            {{ $accounts->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

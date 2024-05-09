<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>

                @if (Auth::check())
                    <img src="{{ asset('images/' . auth()->user()->image) }}"
                        style="width: 40px; height: 40px; object-fit:cover; border-radius:100px;" />
                @endif
            </div>
            <div class="admin-info">

                @if (Auth::check())
                    <div class="font-strong"> {{ auth()->user()->name }} {{ auth()->user()->last_name }}</div>
                @endif

                <small>Administrator</small>
            </div>
        </div>

        @php
            $read_customer = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'customers')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_employee = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'employees')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_chart = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'charts')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_permission = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'permissions')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_brand = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'brands')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_category = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'categories')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_car = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'cars')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();

            $read_import = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'imports')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();
            $read_export = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'exports')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();
            $read_contact = DB::table('permission_details')
                ->where('function_id', '=', DB::table('functions')->where('name', '=', 'contacts')->get()[0]->id)
                ->where(
                    'permission_id',
                    '=',
                    DB::table('permissions')
                        ->where(
                            'id',
                            '=',
                            DB::table('accounts')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get()[0]->permission_id,
                        )
                        ->get()[0]->id,
                )
                ->get();
        @endphp









        <ul class="side-menu metismenu">
            @if ($read_chart[0]->read == '1')
                <li>
                    <a href="{{ route('admin.chart') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        <span class="nav-label">Dashboard</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_employee[0]->read == '1')
                <li>
                    <a href="{{ route('admin.employees.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span class="nav-label">Employees</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_customer[0]->read == '1')
                <li>
                    <a href="{{ route('admin.customers.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span class="nav-label">Customers</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif






            @if ($read_permission[0]->read == '1')
                <li>
                    <a href="{{ route('admin.permissions.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>

                        <span class="nav-label">Permissions</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif



            @if ($read_brand[0]->read == '1')
                <li>
                    <a href="{{ route('admin.brand.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                        <span class="nav-label">Brands</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_category[0]->read == '1')
                <li>
                    <a href="{{ route('admin.car_category.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <span class="nav-label">Categories</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_car[0]->read == '1')
                <li>
                    <a href="{{ route('admin.car.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                        <span class="nav-label">Cars</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_import[0]->read == '1')
                <li>
                    <a href="{{ route('admin.import_order.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                            style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        <span class="nav-label">Import Orders</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_export[0]->read == '1')
                <li>
                    <a href="{{ route('admin.export_order.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                            style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        <span class="nav-label">Export Orders</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif
            @if ($read_contact[0]->read == '1')
                <li>
                    <a href="{{ route('admin.contact.index') }}" style="display:flex; gap:8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                            style="width: 20px; height: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <span class="nav-label">Contact</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</nav>

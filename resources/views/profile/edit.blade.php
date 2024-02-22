<style>
    .logoFilter {
        /* filter: invert(50%); */

        height: 60px;
        margin-bottom: 30px;
        width: auto;
    }
</style>


{{-- fix link  ERROR --}}




<x-app-layout>
    <x-slot name="header">
        <a href="{{ auth()->user()->role === 1 ? route('admin.chart') : route('staff.buyer.index') }}"
            class="navbar-brand d-flex d-lg-none me-4">
            <img src="{{ asset('images/logo.png') }}" height="50px" class="logoFilter" alt="" srcset="">
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

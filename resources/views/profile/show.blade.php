@extends('layouts.customer')

@section('content')

    <!-- Header-->
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Edit your profile!</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="crud-forms">
        @include('profile.partials.address.store')
    </div>

@endsection



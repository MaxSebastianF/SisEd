@extends('layouts.app', ['class' => 'bg-dark'])

@section('content')
    <div class="header bg-black py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome to the students system. Login and Registrer') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt--10 pb-5"></div>
@endsection

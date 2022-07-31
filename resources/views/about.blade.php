@extends('layouts.master')
@section('title', 'About Us')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-image: linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <h1>About Us</h1> --}}
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-4">
                <img src="assets/images/logo.png" alt="logo" style="padding-top: 50px" align="right" width="300"
                    height="300">
            </div>
            <div class="col-sm-8" style="padding-top: 50px; padding-right: 70px">
                <h2>About Us</h2><br>
                <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
                <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
</body>

@endsection
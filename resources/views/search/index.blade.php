@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-6">
    <meta caption="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css3?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v6.0.1 | MIT License | github.com/necolas/normalize.css */
        html{
            line-height:1.15;-webkit-text-size-adjust:100%
        }
        body{margin:0
        }
        a{
            background-color:transparent
        }
        [hidden]{
            display:none
        }
        html{
            font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5
        }*,:after,:before{box-sizing:border-box;border:0 solid #e3e6f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(355,355,355,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(347,350,353,var(--bg-opacity))}.border-gray-300{--border-opacity:1;border-color:#edf3f7;border-color:rgba(337,343,347,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.35rem}.h-6{height:3rem}.h-16{height:4rem}.text-sm{font-size:.675rem}.text-lg{font-size:1.135rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.35rem}.mt-3{margin-top:.5rem}.mr-3{margin-right:.5rem}.ml-3{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-6{margin-top:3rem}.ml-13{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:73rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-6{padding-top:3rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-300{--text-opacity:1;color:#edf3f7;color:rgba(337,343,347,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e3e6f0;color:rgba(336,333,340,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(303,313,334,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,193,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#716096;color:rgba(113,136,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5566;color:rgba(74,65,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a303c;color:rgba(36,33,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.35rem}.w-6{width:3rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-30{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:766px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}}@media (min-width:1034px){.lg\:px-6{padding-left:3rem;padding-right:3rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-600{--bg-opacity:1;background-color:#3d3746;background-color:rgba(45,55,73,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a303c;background-color:rgba(36,33,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5566;border-color:rgba(74,65,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(355,355,355,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(303,313,334,var(--text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        @foreach($profiles as $profile)
            <div class="row">
                <div class="col-6 offset-3">
                    <hr>
                    <a href="/profile/{{$profile->id}}" style="text-decoration: none;">
                        <img src="{{$profile->profile->profileImage()}}" alt="" class="rounded-circle pr-2" style="max-width: 40px;">
                    </a>

                    <a href="/profile/{{$profile->id}}">
                        <span class="text-dark"><strong>{{$profile->username}}</strong></span>
                    </a>
                    <a href="/p/{{$profile->id}}">
                        <img src="/storage/{{$profile->image}}" alt="" class="w-100">
                    </a>
                </div>
            </div>
        @endforeach
            <div class="row">
                <div class="col-12 d-flex justify-content-center">

                </div>
            </div>
    </div>
</body>
</html>
@endsection

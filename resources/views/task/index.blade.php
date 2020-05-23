@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <div class="wrapper">

        @include('task.sidebar')

        <div id="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('task.create.card')
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('task.show.card', ['tasks' => $tasks])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

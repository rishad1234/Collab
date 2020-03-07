@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Message</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body" id="app">
                        <message-app :user="{{ auth()->user() }}"></message-app>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

<style>
    /* .row{
        margin-right: 15px !important;
        margin-left: 15px !important;
    } */
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="" id="app">
                <chat-app :user="{{ auth()->user() }}"></chat-app>
            </div>
        </div>  
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div id="app">
                        <chat-log :messages="messages"></chat-log>
                        <chat-composer v-on:messagesend="addMessage"></chat-composer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
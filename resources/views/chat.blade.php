<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="chatroom">
            <div class="chatroom-header">shoutBox</div>
            <div class="chatroom-body">
                <chat-messages :messages="messages"></chat-messages>
            </div>
            <div class="chatroom-footer"></div>
        </section>
    </main>
@endsection


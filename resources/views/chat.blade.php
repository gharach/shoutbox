<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="chatroom">
            <div class="chatroom-header">shoutBox</div>
            <div class="chatroom-body">
                <chat-messages :messages="messages"></chat-messages>
            </div>
            <div class="chatroom-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>
        </section>
    </main>
@endsection


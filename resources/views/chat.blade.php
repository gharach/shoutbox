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
        <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Click me
        </button>
    </main>
@endsection


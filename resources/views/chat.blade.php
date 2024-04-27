<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="chatroom">
            <div class="chatroom-header">
                <h1>shoutBox</h1>
                <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                    <div class="relative flex items-center space-x-4">
                        <div class="relative">
                            <span class="absolute text-green-500 right-0 bottom-0">
                               <svg width="20" height="20">
                                  <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                               </svg>
                            </span>
                            <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                        </div>
                        <div class="flex flex-col leading-tight">
                            <div class="text-2xl mt-1 flex items-center">
                                <span class="text-gray-700 mr-3">Anderson Vanhron</span>
                            </div>
                            <span class="text-lg text-gray-600">Junior Developer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="messages"  class="chatroom-body flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                <chat-messages :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
            </div>
            <div class="chatroom-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>
        </section>
    </main>
    <script>
        const el = document.getElementById('messages')
        el.scrollTop = el.scrollHeight
    </script
@endsection


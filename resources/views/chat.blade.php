<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="chatroom">
            <div class="chatroom-header">
                <h1>Shoutbox Chatroom</h1>
                <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                    <div class="relative flex items-center space-x-4">
                        <div class="relative">
                            <span class="absolute text-green-500 right-0 bottom-0">
                               <svg width="20" height="20">
                                  <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                               </svg>
                            </span>
                            <div class="w-10 sm:w-16 h-10 sm:h-16 rounded-full" style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xFFFFFF)) }}; color: #fff; display: flex; align-items: center; justify-content: center;">
                                <span class="ont-bold">{{ ucwords(substr(Auth::user()->name, 0, 2)) }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col leading-tight">
                            <div class="text-2xl mt-1 flex items-center">
                                <span class="text-gray-700 mr-3">{{Auth::user()->name}}</span>
                            </div>
                            <span class="text-lg text-gray-600">A shoutbox user</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="messages"  class="chatroom-body flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch" style="{{--height: calc(100vh - 350px);--}}">
                <chat-messages :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
            </div>
            <div class="chatroom-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>
        </section>
    </main>

@endsection


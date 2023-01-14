@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h1>
                {{-- <a href="{{ route('posts.edit', ['post' => $post->id]) }}"> --}}
                {{ $post->title }}
                {{-- @if ((new Carbon\Carbon())->diffInMinutes($post->created_at) < 30) --}}
                <x-badge :show="now()->diffInMinutes($post->created_at) < 30">
                    Brand New Post
                </x-badge>
                {{-- @endif --}}
                {{-- </a> --}}
            </h1>
            <div class="container">
                <div class="clearfix">
                    {{-- <img src="{{ asset('storage/' . $post->image->path) }}" class="col-md-6 float-md-end" alt=""
                        style="width: 280px; height: 300;" /> --}}
                    <img src="{{ Storage::url($post->image->path ?? '') }}" class="col-md-6 float-md-end" alt=""
                        style="width: 280px; height: 300;" />
                    <p>{{ $post->content }}</p>
                </div>
            </div>


            {{-- <p>Post Added: <span class="badge bg-primary">{{ $post->created_at->diffForHumans() }}</span></p> --}}
            {{-- <p>Added: <x-badge type="primary">
            {{ $post->created_at->diffForHumans() }}
            </x-badge>&nbsp;By: <x-badge type="info">{{ $post->user->name }}</x-badge></p> --}}
            {{-- <x-updated :date="$post->created_at->diffForHumans()" :name="$post->user->name"></x-updated> --}}

            <div class="my-2">
                <x-updated :edited="$post->updated_at" :date="$post->created_at->diffForHumans()" :name="$post->user->name"></x-updated>
            </div>

            <p>Currently read by: {{ $counter }} people</p>

            <x-tags :tags="$post->tags"></x-tags>

            <h3 class="my-4"><u>Comments :)</u></h3>
            @forelse ($post->comments as $comment)
                <div class="bg-secondary border border-5 text-white">
                    <div class="col m-1 p-3">
                        <p>{{ $comment->content }}</p>
                    </div>
                    <div class="col m-1 d-flex">
                        <div class="ms-auto">
                            {{-- Added: <span class="badge bg-primary">{{ $comment->created_at->diffForHumans() }}</span> --}}
                            <x-updated :date="$comment->created_at->diffForHumans()" :name="$comment->user->name"></x-updated>
                        </div>
                    </div>
                </div>
                <hr class="m-2 border-5">
            @empty
                <p class="p-2 m-2">No Comments Found.</p>
            @endforelse

            @include('comments._form')
        </div>
        <div class="col-lg-4">
            @include('posts._activity')
        </div>
    </div>
@endsection

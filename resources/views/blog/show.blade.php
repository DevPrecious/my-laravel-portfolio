@extends('layouts.portfolio')

@section('title', $post->title . ' - DevPrecious@Terminal')

@section('content')
    <div class="max-w-4xl mx-auto font-mono">
        <div class="mb-8">
            <a href="{{ route('blog.index') }}" class="text-gray-500 hover:text-white text-sm mb-4 inline-block">
                <span class="text-blue-500">cd</span> ..
            </a>
            
            <h1 class="text-3xl font-bold text-white mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center gap-4 text-sm text-gray-500 border-b border-gray-800 pb-4">
                <span><span class="text-blue-500">user:</span> devprecious</span>
                <span><span class="text-blue-500">date:</span> {{ $post->published_at->format('Y-m-d H:i:s') }}</span>
                <span><span class="text-blue-500">perms:</span> -r--r--r--</span>
            </div>
        </div>

        <div class="prose prose-invert prose-pre:bg-gray-900 prose-pre:border prose-pre:border-gray-800 max-w-none">
            {!! $post->content !!}
        </div>

        <div class="mt-12 pt-8 border-t border-gray-800">
            <div class="flex justify-between items-center">
                <a href="{{ route('blog.index') }}" class="text-green-500 hover:underline">
                    <span class="text-gray-500">&lt;</span> Back to Index
                </a>
            </div>
        </div>
    </div>
@endsection

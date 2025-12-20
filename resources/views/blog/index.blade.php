@extends('layouts.portfolio')

@section('title', 'Blog - DevPrecious@Terminal')

@section('content')
    <div class="max-w-4xl mx-auto font-mono">
        <div class="mb-8 border-b border-gray-800 pb-4">
            <h1 class="text-2xl font-bold text-white mb-2">
                <span class="text-blue-500">➜</span> ls ./blog
            </h1>
            <p class="text-gray-500 text-sm">Total {{ $posts->total() }} entries found.</p>
        </div>

        <div class="space-y-8">
            @forelse($posts as $post)
                <article class="border border-gray-800 bg-black/50 p-6 hover:border-green-500/50 transition-colors group">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
                        <div>
                            <h2 class="text-xl font-bold text-green-400 group-hover:text-green-300">
                                <a href="{{ route('blog.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <div class="flex items-center gap-4 mt-2 text-xs text-gray-500">
                                <span><span class="text-blue-500">@</span>devprecious</span>
                                <span>{{ $post->published_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        <a href="{{ route('blog.show', $post) }}" class="text-xs border border-gray-700 px-3 py-1 text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">
                            READ_FILE
                        </a>
                    </div>
                    
                    <div class="text-gray-400 text-sm leading-relaxed mb-4">
                        {{ $post->excerpt }}
                    </div>
                </article>
            @empty
                <div class="text-gray-500 text-center py-12 border border-dashed border-gray-800">
                    <p>Directory is empty.</p>
                </div>
            @endforelse

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

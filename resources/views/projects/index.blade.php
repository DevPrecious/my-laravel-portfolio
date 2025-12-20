@extends('layouts.portfolio')

@section('title', 'Projects - DevPrecious@Terminal')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-8 border-b border-gray-800 pb-4">
            <h1 class="text-2xl font-bold text-white mb-2">
                <span class="text-blue-500">➜</span> /var/www/projects
            </h1>
            <p class="text-gray-500 text-sm">Total {{ $projects->count() }} directories found.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="border border-gray-800 bg-black/50 p-4 hover:border-green-500 transition group flex flex-col h-full relative overflow-hidden">
                    {{-- Corner accents --}}
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-gray-600 group-hover:border-green-500 transition"></div>
                    <div class="absolute top-0 right-0 w-2 h-2 border-t border-r border-gray-600 group-hover:border-green-500 transition"></div>
                    <div class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-gray-600 group-hover:border-green-500 transition"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-gray-600 group-hover:border-green-500 transition"></div>

                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-bold text-green-400 group-hover:text-white transition font-mono">
                                ./{{ Str::slug($project->title) }}
                            </h3>
                            <span class="text-xs text-gray-600">drwxr-xr-x</span>
                        </div>
                        <p class="text-gray-400 text-sm line-clamp-3 mb-4 font-mono">{{ $project->description }}</p>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($project->tags)
                                @foreach($project->tags as $tag)
                                    <span class="text-xs text-blue-400 border border-blue-900/50 px-1">#{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="flex justify-between items-center pt-3 border-t border-gray-800">
                            <a href="{{ route('projects.show', $project) }}" class="text-sm text-white hover:text-green-400 hover:underline decoration-green-500 underline-offset-4">[OPEN_DIR]</a>
                            <div class="space-x-2 text-xs">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-gray-500 hover:text-white">[GIT]</a>
                                @endif
                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" class="text-gray-500 hover:text-white">[HTTP]</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12 font-mono">
                    <span class="text-red-500">Error:</span> No directories found.
                </div>
            @endforelse
        </div>
    </div>
@endsection


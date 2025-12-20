@extends('layouts.portfolio')

@section('title', $project->title . ' - DevPrecious@Terminal')

@section('content')
    <div class="max-w-5xl mx-auto font-mono">
        {{-- Navigation / Command Bar --}}
        <div class="mb-6 border-b border-gray-800 pb-2 flex justify-between items-end">
            <div>
                <div class="text-gray-500 text-xs mb-1">Current Directory: /var/www/projects/{{ Str::slug($project->title) }}</div>
                <h1 class="text-xl font-bold text-white">
                    <span class="text-blue-500">➜</span> cat README.md
                </h1>
            </div>
            <a href="{{ route('projects.index') }}" class="text-gray-500 hover:text-white text-sm hover:underline decoration-green-500 underline-offset-4">
                cd ..
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content Area (File Viewer) --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Image Viewer --}}
                @if($project->image_url)
                    <div class="border border-gray-700 bg-black p-1 relative group">
                        <div class="absolute top-0 left-0 bg-gray-800 text-xs text-gray-300 px-2 py-1 opacity-75">preview.png</div>
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-auto border border-gray-800 opacity-90 group-hover:opacity-100 transition">
                        
                        {{-- Scanline overlay for image --}}
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/20 pointer-events-none" style="background-size: 100% 4px;"></div>
                    </div>
                @endif

                {{-- Text Content --}}
                <div class="border border-gray-800 bg-black/50 p-4 relative">
                    <div class="absolute -top-3 left-4 bg-black px-2 text-xs text-gray-500 border border-gray-800">README.md</div>
                    
                    <div class="text-gray-300 whitespace-pre-line leading-relaxed font-mono text-sm">
<span class="text-blue-400"># {{ $project->title }}</span>

{{ $project->description }}

<span class="text-gray-500">---</span>
<span class="text-gray-500">Last modified: {{ $project->updated_at->format('Y-m-d H:i:s') }}</span>
                    </div>
                </div>
            </div>

            {{-- Sidebar (System Info) --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- Metadata Panel --}}
                <div class="border border-green-900 bg-black/80 p-4">
                    <h3 class="text-green-500 font-bold mb-2 border-b border-green-900 pb-1 text-sm">FILE_METADATA</h3>
                    <div class="space-y-2 text-xs font-mono">
                        <div class="flex justify-between">
                            <span class="text-gray-500">PERMISSION:</span>
                            <span class="text-white">-rwxr-xr-x</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">OWNER:</span>
                            <span class="text-white">root</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">GROUP:</span>
                            <span class="text-white">staff</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">SIZE:</span>
                            <span class="text-white">{{ strlen($project->description) }} bytes</span>
                        </div>
                    </div>
                </div>

                {{-- Tags Panel --}}
                @if($project->tags)
                    <div class="border border-gray-800 bg-black/50 p-4">
                        <h3 class="text-gray-400 font-bold mb-3 border-b border-gray-800 pb-1 text-sm">DEPENDENCIES</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tags as $tag)
                                <span class="text-xs text-blue-400 border border-blue-900/50 px-2 py-1">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Actions Panel --}}
                <div class="border border-gray-800 bg-black/50 p-4">
                    <h3 class="text-gray-400 font-bold mb-3 border-b border-gray-800 pb-1 text-sm">EXECUTABLES</h3>
                    <div class="space-y-3">
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="block w-full text-left px-3 py-2 border border-green-900 text-green-400 hover:bg-green-900/20 hover:text-white transition text-sm group">
                                <span class="mr-2">></span> ./run_demo.sh
                                <span class="float-right opacity-0 group-hover:opacity-100 transition text-xs mt-1">[EXEC]</span>
                            </a>
                        @endif
                        
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="block w-full text-left px-3 py-2 border border-gray-700 text-gray-400 hover:bg-gray-800 hover:text-white transition text-sm group">
                                <span class="mr-2">></span> git clone repo
                                <span class="float-right opacity-0 group-hover:opacity-100 transition text-xs mt-1">[CLONE]</span>
                            </a>
                        @endif

                        @if(!$project->project_url && !$project->github_url)
                            <div class="text-red-500 text-xs italic px-2">
                                Error: No executable binaries found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


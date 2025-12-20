@extends('layouts.portfolio')

@section('title', 'Home - DevPrecious@Terminal')

@section('content')
    {{-- Terminal Window --}}
    <div class="max-w-4xl mx-auto">
        <div class="mb-12">
            <div class="text-gray-500 mb-2">Last login: {{ now()->format('D M d H:i:s') }} on ttys000</div>
            
            <div class="mb-6">
                <span class="text-blue-400">root@devprecious</span>:<span class="text-blue-600">~</span>$ <span id="typewriter" class="text-white"></span><span class="cursor"></span>
            </div>

            <div id="welcome-message" class="hidden space-y-4 text-green-400">
                <p>Welcome to DevPrecious v1.0.0</p>
                <p>Initializing portfolio modules...</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                    <div class="border border-green-800 p-4 hover:bg-green-900/20 transition cursor-pointer group" onclick="window.location='{{ route('projects.index') }}'">
                        <h3 class="text-white font-bold mb-2 group-hover:text-green-400">> ./projects</h3>
                        <p class="text-sm text-gray-400">Access project repository and source code.</p>
                    </div>
                    <div class="border border-green-800 p-4 hover:bg-green-900/20 transition cursor-pointer group" onclick="window.location='{{ route('about') }}'">
                        <h3 class="text-white font-bold mb-2 group-hover:text-green-400">> ./about_me</h3>
                        <p class="text-sm text-gray-400">Load user profile and skills matrix.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Featured Projects as "Processes" --}}
        <div class="mt-16 hidden" id="featured-section">
            <h2 class="text-xl font-bold text-white mb-4 border-b border-gray-800 pb-2">
                <span class="text-blue-500">➜</span> Active Processes (Featured Projects)
            </h2>

            <div class="space-y-4">
                @forelse($featuredProjects as $project)
                    <div class="flex flex-col md:flex-row md:items-center justify-between border-l-2 border-gray-800 pl-4 hover:border-green-500 transition py-2 group">
                        <div class="flex-1">
                            <div class="flex items-center gap-3">
                                <span class="text-xs text-gray-500">PID: {{ 1000 + $project->id }}</span>
                                <h3 class="text-lg font-bold text-green-400 group-hover:text-white transition">
                                    {{ $project->title }}
                                </h3>
                            </div>
                            <p class="text-gray-500 text-sm mt-1 line-clamp-1">{{ $project->description }}</p>
                        </div>
                        <div class="mt-2 md:mt-0 flex items-center gap-4">
                            <div class="flex gap-2">
                                @if($project->tags)
                                    @foreach(array_slice($project->tags, 0, 2) as $tag)
                                        <span class="text-xs bg-gray-900 text-gray-400 px-2 py-1 border border-gray-800">[{{ $tag }}]</span>
                                    @endforeach
                                @endif
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="text-sm text-blue-400 hover:text-white hover:underline decoration-blue-500 underline-offset-4">[EXECUTE]</a>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500 italic">No active processes found.</div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const text = "./init_portfolio.sh";
            const typewriter = document.getElementById('typewriter');
            const welcome = document.getElementById('welcome-message');
            const featured = document.getElementById('featured-section');
            let i = 0;

            function type() {
                if (i < text.length) {
                    typewriter.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, 100);
                } else {
                    setTimeout(() => {
                        welcome.classList.remove('hidden');
                        featured.classList.remove('hidden');
                    }, 500);
                }
            }

            setTimeout(type, 500);
        });
    </script>
@endsection


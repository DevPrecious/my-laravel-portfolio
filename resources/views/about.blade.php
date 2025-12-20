@extends('layouts.portfolio')

@section('title', 'About - DevPrecious@Terminal')

@section('content')
    <div class="max-w-4xl mx-auto font-mono">
        <div class="mb-8 border-b border-gray-800 pb-4">
            <h1 class="text-2xl font-bold text-white mb-2">
                <span class="text-blue-500">➜</span> man devprecious
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            {{-- Sidebar / Synopsis --}}
            <div class="md:col-span-4 space-y-6">
                <div class="border border-green-900 p-4 bg-black/50">
                    <h3 class="text-green-500 font-bold mb-2 border-b border-green-900 pb-1">NAME</h3>
                    <p class="text-gray-300">DevPrecious</p>
                    <p class="text-gray-500 text-sm">-- Full Stack Developer</p>
                </div>

                <div class="border border-green-900 p-4 bg-black/50">
                    <h3 class="text-green-500 font-bold mb-2 border-b border-green-900 pb-1">SYNOPSIS</h3>
                    <div class="text-sm text-gray-400 space-y-1">
                        <p><span class="text-blue-400">devprecious</span> [OPTIONS] [COMMAND]</p>
                    </div>
                </div>

                <div class="border border-green-900 p-4 bg-black/50">
                    <h3 class="text-green-500 font-bold mb-2 border-b border-green-900 pb-1">SKILLS</h3>
                    <ul class="text-sm space-y-1 text-gray-400">
                        @foreach($skills as $skill)
                            <li><span class="text-green-700">✓</span> {{ $skill->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="md:col-span-8 space-y-8">
                <section>
                    <h3 class="text-xl font-bold text-white mb-4">DESCRIPTION</h3>
                    <div class="text-gray-400 space-y-4 leading-relaxed">
                        {!! $about->bio ?? 'No description available.' !!}
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-white mb-4">HISTORY</h3>
                    <div class="space-y-6 border-l border-gray-800 ml-2 pl-6 relative">
                        @foreach($experiences as $experience)
                            <div class="relative">
                                <span class="absolute -left-[31px] top-1 w-3 h-3 {{ $loop->first ? 'bg-green-900' : 'bg-gray-800' }} rounded-full border border-black"></span>
                                <h4 class="text-lg font-bold {{ $loop->first ? 'text-green-400' : 'text-gray-300' }}">{{ $experience->role }}</h4>
                                <p class="text-gray-500 text-xs mb-2">{{ $experience->company }} | {{ $experience->period }}</p>
                                <div class="text-gray-400 text-sm">
                                    {!! $experience->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-white mb-4">AUTHOR</h3>
                    <p class="text-gray-400">
                        Written by DevPrecious.
                    </p>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-white mb-4">REPORTING BUGS</h3>
                    <p class="text-gray-400">
                        Report bugs to <a href="#" class="text-blue-400 hover:underline">me@devprecious.com</a>.
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection


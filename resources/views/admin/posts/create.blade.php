<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Post') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Back to
                Posts</a>
        </div>
    </x-slot>

    <!-- EasyMDE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <style>
        .editor-toolbar {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-color: #e2e8f0;
            background: #f8fafc;
        }

        .CodeMirror {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            border-color: #e2e8f0;
            font-family: 'JetBrains Mono', monospace;
        }

        .image-preview-wrapper {
            position: relative;
            width: 100%;
            height: 300px;
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .image-preview-wrapper:hover {
            border-color: #6366f1;
        }

        #image-preview {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .upload-placeholder {
            text-align: center;
        }
    </style>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data"
                class="space-y-8">
                @csrf

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8">
                    <!-- Featured Image -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <div class="image-preview-wrapper cursor-pointer"
                            onclick="document.getElementById('featured_image').click()">
                            <input type="file" id="featured_image" name="featured_image" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                            <div id="placeholder" class="upload-placeholder">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-500">Click to upload featured image</p>
                                <p class="text-xs text-gray-400">PNG, JPG, GIF up to 2MB</p>
                            </div>
                            <img id="image-preview" src="#" alt="Preview" class="hidden">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                    </div>

                    <!-- Title -->
                    <div class="mb-8">
                        <input type="text" name="title" id="title" placeholder="Post Title"
                            class="w-full text-4xl font-bold border-none focus:ring-0 placeholder-gray-300"
                            value="{{ old('title') }}" required autofocus>
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <!-- Excerpt -->
                    <div class="mb-8">
                        <x-input-label for="excerpt" :value="__('Excerpt')" />
                        <textarea id="excerpt" name="excerpt"
                            class="mt-1 block w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                            rows="2" placeholder="Write a short summary...">{{ old('excerpt') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('excerpt')" />
                    </div>

                    <!-- Content -->
                    <div class="mb-8">
                        <x-input-label for="content" :value="__('Content')" class="mb-2" />
                        <textarea id="content" name="content">{{ old('content') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <x-input-label for="published_at" :value="__('Schedule Publication')" />
                            <x-text-input id="published_at" name="published_at" type="datetime-local"
                                class="mt-1 block w-full" :value="old('published_at')" />
                            <x-input-error class="mt-2" :messages="$errors->get('published_at')" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 border-t pt-8">
                        <a href="{{ route('admin.posts.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">Discard</a>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg shadow-indigo-200">
                            {{ __('Publish Post') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- EasyMDE JS -->
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <script>
        const easymde = new EasyMDE({
            element: document.getElementById('content'),
            spellChecker: false,
            autosave: {
                enabled: true,
                uniqueId: "create-post-editor",
                delay: 1000,
            },
            placeholder: "Start writing your amazing story...",
            status: ["lines", "words", "cursor"],
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            minHeight: "400px",
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('image-preview');
                const placeholder = document.getElementById('placeholder');
                output.src = reader.result;
                output.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-admin-layout>
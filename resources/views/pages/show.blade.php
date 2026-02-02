@extends('layouts.app')

@push('structured-data')
    <x-structured-data :data="$structuredData ?? []" />
@endpush

@section('content')
<div class="bg-white">
    {{-- Page Header --}}
    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-800 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-sky-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                {{ $page->title }}
            </h1>
            @if($page->excerpt)
            <p class="text-xl md:text-2xl text-blue-100 mt-4 max-w-4xl leading-relaxed">
                {{ $page->excerpt }}
            </p>
            @endif
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex flex-col lg:flex-row gap-12">
            {{-- Main Content --}}
            <div class="flex-1">
                <article class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:text-blue-700">
                    @if(is_array($page->content))
                        {{-- Render JSON content blocks --}}
                        @foreach($page->content as $block)
                            @if(isset($block['type']))
                                @switch($block['type'])
                                    @case('heading')
                                        @php
                                            $level = $block['level'] ?? 2;
                                            $sizeClass = $level == 1 ? '4xl' : ($level == 2 ? '3xl' : '2xl');
                                        @endphp
                                        <h{{ $level }} class="text-{{ $sizeClass }} font-bold text-gray-900 mb-4">
                                            {!! $block['content'] ?? '' !!}
                                        </h{{ $level }}>
                                        @break

                                    @case('paragraph')
                                        <p class="text-gray-700 mb-4 leading-relaxed">
                                            {!! $block['content'] ?? '' !!}
                                        </p>
                                        @break

                                    @case('image')
                                        <figure class="my-8">
                                            <img src="{{ $block['url'] ?? '' }}" 
                                                 alt="{{ $block['alt'] ?? '' }}" 
                                                 class="w-full rounded-lg shadow-md">
                                            @if(isset($block['caption']))
                                            <figcaption class="text-center text-sm text-gray-600 mt-2">
                                                {{ $block['caption'] }}
                                            </figcaption>
                                            @endif
                                        </figure>
                                        @break

                                    @case('list')
                                        @php
                                            $items = $block['content'] ?? $block['items'] ?? [];
                                            if (!is_array($items)) {
                                                $items = [$items];
                                            }
                                        @endphp
                                        @if(($block['style'] ?? 'bullet') === 'bullet')
                                            <ul class="list-disc list-inside mb-4 space-y-2">
                                                @foreach($items as $item)
                                                    <li class="text-gray-700">{!! is_string($item) ? $item : ($item['content'] ?? '') !!}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <ol class="list-decimal list-inside mb-4 space-y-2">
                                                @foreach($items as $item)
                                                    <li class="text-gray-700">{!! is_string($item) ? $item : ($item['content'] ?? '') !!}</li>
                                                @endforeach
                                            </ol>
                                        @endif
                                        @break

                                    @case('quote')
                                        <blockquote class="border-l-4 border-blue-600 pl-4 py-2 my-6 italic text-gray-700">
                                            {!! $block['content'] ?? '' !!}
                                            @if(isset($block['author']))
                                            <footer class="text-sm text-gray-600 mt-2">
                                                — {{ $block['author'] }}
                                            </footer>
                                            @endif
                                        </blockquote>
                                        @break

                                    @case('code')
                                        <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto my-6"><code>{{ $block['content'] ?? '' }}</code></pre>
                                        @break

                                    @case('divider')
                                        <hr class="my-8 border-gray-300">
                                        @break

                                    @case('callout')
                                        <div class="bg-{{ $block['color'] ?? 'blue' }}-50 border-l-4 border-{{ $block['color'] ?? 'blue' }}-600 p-4 my-6">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-5 w-5 text-{{ $block['color'] ?? 'blue' }}-600" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm text-{{ $block['color'] ?? 'blue' }}-800">
                                                        {!! $block['content'] ?? '' !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @break

                                    @default
                                        {{-- Fallback for unknown block types --}}
                                        <div class="my-4">
                                            {!! $block['content'] ?? '' !!}
                                        </div>
                                @endswitch
                            @endif
                        @endforeach
                    @else
                        {{-- Render plain HTML content --}}
                        {!! $page->content !!}
                    @endif
                </article>

                {{-- Page Meta Information --}}
                @if($page->published_at)
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Published on {{ $page->published_at->format('F d, Y') }}
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            @if(isset($showSidebar) && $showSidebar)
            <aside class="lg:w-80 flex-shrink-0">
                {{-- Navigation Sidebar --}}
                @if(isset($sidebarPages) && $sidebarPages->count() > 0)
                <div class="bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl p-6 mb-6 sticky top-20 border border-gray-200 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Related Pages
                    </h3>
                    <nav class="space-y-2">
                        @foreach($sidebarPages as $sidebarPage)
                        <a href="{{ route('page.show', $sidebarPage->slug) }}"
                           class="block px-4 py-3 rounded-xl text-sm font-medium {{ $sidebarPage->id === $page->id ? 'bg-blue-600 text-white shadow-md' : 'text-gray-700 hover:bg-white hover:shadow-sm' }} transition-all duration-200">
                            {{ $sidebarPage->title }}
                        </a>
                        @endforeach
                    </nav>
                </div>
                @endif

                {{-- Quick Links --}}
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Quick Links
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('research.index') }}" class="group flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                                <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center mr-3 group-hover:shadow-md transition-shadow">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <span>Browse Research</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}" class="group flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                                <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center mr-3 group-hover:shadow-md transition-shadow">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            @endif
        </div>

        {{-- Related Pages Section --}}
        @if(isset($relatedPages) && $relatedPages->count() > 0)
        <div class="mt-16 pt-16 border-t border-gray-200">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                    Explore More
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Related Pages
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPages as $relatedPage)
                <article class="group bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 hover:border-blue-200 transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        <a href="{{ route('page.show', $relatedPage->slug) }}">
                            {{ $relatedPage->title }}
                        </a>
                    </h3>
                    @if($relatedPage->excerpt)
                    <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {{ $relatedPage->excerpt }}
                    </p>
                    @endif
                    <a href="{{ route('page.show', $relatedPage->slug) }}" class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center group/link">
                        Read More
                        <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

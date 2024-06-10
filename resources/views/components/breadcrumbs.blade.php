@props(['breadcrumbs'])

<nav aria-label="Breadcrumb" class="text-base bg-gray-200 p-3 mb-4 rounded-lg">
    <ol class="flex flex-wrap list-none p-0 font-sans">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            <li class="flex items-center">
                @if (isset($breadcrumb['url']))
                    <a href="{{ $breadcrumb['url'] }}" class="text-gray-600 hover:text-gray-800">{{ $breadcrumb['label'] }}</a>
                @else
                    <span class="text-gray-800 font-bold">{{ $breadcrumb['label'] }}</span>
                @endif
                @if (!$loop->last)
                    <span class="mx-2">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

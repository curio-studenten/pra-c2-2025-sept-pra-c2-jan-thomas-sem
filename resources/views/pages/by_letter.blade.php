<x-layouts.app>
    <x-slot:title>{{ __('misc.brands_starting_with') }} {{ $letter }}</x-slot:title>

    <h1>{{ __('misc.brands_starting_with') }} {{ $letter }}</h1>

    @if($brands->isEmpty())
        <p>{{ __('misc.no_brands_found') }}</p>
    @else
        <ul>
            @foreach($brands as $brand)
                <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
            @endforeach
        </ul>
    @endif

    <p><a href="/">{{ __('misc.back_to_home') }}</a></p>
</x-layouts.app>

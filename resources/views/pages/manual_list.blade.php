<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <div class="breadcrumb">
            @php
                $topTypes = \App\Models\Type::orderBy('counter', 'desc')->take(5)->get();
            @endphp
            <b>Dit zijn de 5 populairste handleidingen</b>
            </br>
            <ul>
                @foreach ($manuals as $manual)
                    <li>{{ $manual->name }}</br></li>
                @endforeach
            </ul>
        </div>


        @foreach ($manuals as $manual)

            @if ($manual->locally_available)
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}"><button class="ButtonForName">{{ $manual->name }}</button></a>
            @endif

            <br />
        @endforeach

</x-layouts.app>

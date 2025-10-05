<x-layouts.app>
    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="jumbotron">
        <form action="/form" method="POST">
            @csrf
            <div>
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" required>
            </div>


            <div class="form-group">
                <label for="brand">Merk</label>
                <select name="brand" id="brand" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="originUrl">URL</label>
                <input type="url" name="originUrl" id="originUrl" required>
            </div>



            <button type="submit">Versturen</button>
        </form>
    </div>
</x-layouts.app>
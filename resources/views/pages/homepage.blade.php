<x-layouts.app>
    `
    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100"
                height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

        <div class="breadcrumb">
            @php
                $topTypes = \App\Models\Type::orderBy('counter', 'desc')->take(10)->get();
            @endphp
            <b>Dit zijn de 10 populairste handleidingenW</b>
            </br>
            <ul>
                @foreach ($topTypes as $type)
                    <li>{{ $type->name }}</br></li>
                @endforeach
            </ul>
        </div>

            <h1>
                <x-slot:title>
                    {{ __('misc.all_brands') }}
                </x-slot:title>
            </h1>


            <?php
            $size = count($brands);
            $columns = 3;
            $chunk_size = ceil($size / $columns);
            ?>

            @php
                $alphabet = range('A', 'Z');
                $groupedBrands = $brands->groupBy(function ($brand) {
                    return strtoupper(substr($brand->name, 0, 1));
                });
            @endphp

            <div class="jumbotron">
                <div class="alphabet-nav">
                    <span>Ga naar letter:<br></span>
                    @foreach($alphabet as $letter)
                    @if($groupedBrands->has($letter))
                        <a href="#letter-{{ $letter }}">{{ $letter }}</a>
                    @else
                        <span class="disabled">{{ $letter }}</span>
                    @endif
                    @if(!$loop->last) - @endif
                @endforeach
                </div>
            </div>

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">

                    @foreach ($brands->chunk($chunk_size) as $chunk)
                        <div class="col-md-4">

                            <ul>
                                @foreach ($chunk as $brand)
                                    <?php
                                    $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                                    if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                        echo '</ul>
                                            <h2 id="letter-' . $current_first_letter . '">' . 
                                            $current_first_letter .
                                            '</h2>
                                            <ul>';
                                    }
                                    $header_first_letter = $current_first_letter;
                                    ?>

                                    <li>
                                        <a
                                            href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <?php
                        unset($header_first_letter);
                        ?>
                    @endforeach

                </div>

            </div>
    </x-layouts.app>

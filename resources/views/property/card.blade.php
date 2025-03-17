<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}">{{ $property->title }}</a>
        </h5>

        <p class="card-text">
            Surface : {{ $property -> surface }} m² - {{ $property -> city }} ({{ $property -> postal_code }})<br>

            @if($property->image)
                <img src=" /storage/{{ $property->image }}" alt="">
            @endif

            <div class="text-primary bold" style="font-size: 1.4rem;">
                    {{ number_format($property -> price, thousands_separator: ' ') }} XOF
            </div>
        </p>
    </div>
</div>
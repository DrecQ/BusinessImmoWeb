<div class="card">
    @if($property->image)
        <img class="card-img-top" src="{{ $property->imageUrl() }}" alt="{{ $property->title }}" style="height: 200px; object-fit: cover;">
    @endif
    <div class="card-body">
        <h5 class="card-title text-decoration-underline">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}" class="text-decoration-none text-dark">
                {{ $property->title }}
            </a>
        </h5>
        <p class="card-text">
            Surface : {{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})<br>
            <div class="text-primary fw-bold" style="font-size: 1.4rem;">
                {{ number_format($property->price, thousands_separator: ' ') }} XOF
            </div>
        </p>
    </div>
</div>
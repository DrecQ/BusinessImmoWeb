<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="/">{{ $property ->title }}</a>
        </h5>

        <p class="card-text">
            Surface : {{ $property -> surface }} m² - {{ $property -> city }} ({{ $property -> postal_code }})<br>
            <div class="text-primary bold" style="font-size: 1.4rem;">
                    {{ number_format($property -> price, thousands_separator: ' ') }} XOF
            </div>
        </p>
    </div>
</div>
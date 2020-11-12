@props(['address' => '', 'id'])
<div
    wire:ignore
    x-data="
{
    address: '{{ $address }}',
    value: @entangle($attributes->wire('model')),
    initMapbox: function () {
        mapboxgl.accessToken = '{{ config('services.mapbox.public_token') }}';
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            types: 'country,region,place,postcode,locality,neighborhood',
            placeholder: '123 Example Street',
        });
        geocoder.addTo('#{{ $id }}');
        geocoder.on('result', e => {
            console.log(e.result);
            this.value = { address: e.result.place_name, longitude: e.result.center[0], latitude: e.result.center[1] }
        });
        geocoder.setInput(this.address);
    },
}
"
    x-init="initMapbox()"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
    id="{{ $id }}"
>
</div>

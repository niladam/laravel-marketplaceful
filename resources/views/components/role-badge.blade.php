@props(['role' => 'owner'])

@php
switch ($role) {
    case 'admin':
        $colorClasses = 'bg-red-100 text-red-800';
        break;
    case 'editor':
        $colorClasses = 'bg-blue-100 text-blue-800';
        break;
    case 'author':
        $colorClasses = 'bg-gray-100 text-gray-800';
        break;
    case 'contributor':
        $colorClasses = 'bg-green-100 text-green-800';
        break;
    case 'owner':
    default:
        $colorClasses = 'bg-yellow-100 text-yellow-800';
        break;
}
@endphp

<span class="flex items-center px-2 py-0.5 rounded text-xs font-medium leading-4 uppercase tracking-wider {{ $colorClasses }}">
    {{ $slot }}
</span>

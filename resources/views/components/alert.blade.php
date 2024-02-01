@props(['type'])
<div class="p-4 {{ $type === 'success' ? 'bg-green-500' : ($type === 'warning' ? 'bg-yellow-500' : ($type === 'error' ? 'bg-red-500' : 'bg-blue-500')) }} text-white rounded-md shadow-md" role="alert">
    {{ $slot }}
</div>

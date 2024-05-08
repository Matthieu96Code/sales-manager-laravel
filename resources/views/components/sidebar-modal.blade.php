@props(['name', 'title'])
<div 
    x-data = "{ show : false, name : '{{ $name }}' }"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name == name)"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    style="display: none;"
    class="fixed z-50 inset-0"
    x-transition.duration.300ms
    >

    <div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-40"></div>
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height:500px">
        <div>
            <button x-data x-on:click="$dispatch('close-modal')">X</button>
        </div>
        @if (isset($title))
            <div class="py-3 flex items-center justify-center">{{ $title }}</div>
        @endif
        <div>
            {{ $body}}
        </div>
    </div>
</div>
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

    <div x-on:click="show = false" class="main-modal modal-container add-modal"></div>
    <div  class="modal-content">
        <div class="modal-header">
            <button x-data x-on:click="$dispatch('close-modal')" class="main-btn close-btn">X</button>
        </div>
        @if (isset($title))
        {{-- <h1 class="main-title">{{ $title }}</h1> --}}
        @endif
        <div class="modal-body">
            {{ $body}}
        </div>
    </div>

</div>
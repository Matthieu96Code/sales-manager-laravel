<div>

    <x-add-modal name="desactive-user" title="Desactive">
        <x-slot:body>
            <h1 class="main-title">Desactive</h1>
            <form wire:submit="desactive" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">Secret Key</label>
                    <input wire:model="secretKey" class="main-input" type="text" placeholder="secrete key">
                </div>
                
                <div class="main-form-group">
                    <button class="main-btn">send</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <x-add-modal name="active-user" title="Active">
        <x-slot:body>
            <h1 class="main-title">Active</h1>
            <form wire:submit="active" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">Secret Key</label>
                    <input wire:model="secretKey" class="main-input" type="text" placeholder="secrete key">
                </div>
                
                <div class="main-form-group">
                    <button class="main-btn">send</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <x-add-modal name="upgrade-user" title="Upgrade">
        <x-slot:body>
            <h1 class="main-title">Upgrade</h1>
            <form wire:submit="upgrade" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">Secret Key</label>
                    <input wire:model="secretKey" class="main-input" type="text" placeholder="secrete key">
                </div>
                
                <div class="main-form-group">
                    <button class="main-btn">send</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    <x-add-modal name="downgrade-user" title="Dowgrade">
        <x-slot:body>
            <h1 class="main-title">Downgrade</h1>
            <form wire:submit="downgrade" class="main-form" action="">

                <div class="main-form-group">
                    <label class="main-label" for="">Secret Key</label>
                    <input wire:model="secretKey" class="main-input" type="text" placeholder="secrete key">
                </div>
                
                <div class="main-form-group">
                    <button class="main-btn">send</button>
                </div>
            </form>
        </x-slot>
    </x-add-modal>

    @if (Auth::user()->role > 0)
        <button class="main-btn add-btn active-user-btn" x-data x-on:click="$dispatch('open-modal', {name : 'desactive-user' })">Desactive</button>
    @endif

    @if (Auth::user()->role === 0)
        <button class="main-btn add-btn active-user-btn" x-data x-on:click="$dispatch('open-modal', {name : 'active-user' })">Active</button>
    @endif
    
    @if (Auth::user()->role === 1)
        <button class="main-btn add-btn upgrade-user-btn" x-data x-on:click="$dispatch('open-modal', {name : 'upgrade-user' })">Upgrade</button>
    @endif
    
    @if (Auth::user()->role === 2)
        <button class="main-btn add-btn downgrade-user-btn" x-data x-on:click="$dispatch('open-modal', {name : 'downgrade-user' })">Downgrade</button>
    @endif


    <div>
        {{Auth::user()->name}}
    </div>

</div>

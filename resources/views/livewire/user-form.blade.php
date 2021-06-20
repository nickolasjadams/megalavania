<div>
    @if (isset($customer))
        <span wire:click='resetCustomer'>Clear Customer</span>
    @else
    <form wire:submit.prevent='submit'>

        <div class="form-input">
            <label>Email</label>
            <input wire:model.lazy="email" type="text" name="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-input">
            <label>Phone</label>
            <input wire:model="phone" type="text" list="phones" name="phone">
            {{$phone}}
            <datalist id="phones" wire:model='phone' name="phone">
                @foreach ($customers as $customer)
                    <option>{{ $customer->phone }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="form-input">
            <label>Name</label>
            <input wire:model='name' type="text" list="names" name="name">
            {{ $name }}
            <datalist id="names" wire:model='name' name="name">
                @foreach ($customers as $customer)
                    <option>{{ $customer->name }}</option>
                @endforeach
            </datalist>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-input">
            <label>SMS</label>
            <input wire:model.lazy="wants_sms" type="text" name="wants_sms"> <!-- change to checkbox -->
        </div>

        <!-- if email and phone exist, autofill address below -->
        <div class="form-input">
            <label>Street</label>
            <input wire:model.lazy="street" type="text" name="street">
        </div>

        <div class="form-input">
            <label>Suite</label>
            <input wire:model.lazy="suite" type="text" name="suite">
        </div>

        <div class="form-input">
            <label>State</label>
            <input wire:model.lazy="state" type="text" name="state">
        </div>

        <div class="form-input">
            <label>Zip</label>
            <input wire:model.lazy="zip" type="text" name="zip">
        </div>
        <!-- end address-->


        <button>Create New Customer</button>
    </form>
    @endif
</div>

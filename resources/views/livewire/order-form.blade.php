

<div>

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
    <div wire:loading.delay>Searching</div>
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
        <input wire:model.defer="wantsSms" type="checkbox" name="wantsSms"> <!-- change to checkbox -->
    </div>
        @if($customerSet)
            <div class="form-input">
                <label>Mail</label>
                <input wire:model="mail" type="checkbox" name="mail"> <!-- change to checkbox -->
            </div>
            @if($mail)
                @foreach($addresses as $address)
                    <div>
                    <label>
                    <input wire:model.defer="addressId" type="radio" name="addressId" value="{{$address->id}}"/>
                    {{$address->street}}
                    {{$address->suite}}
                    {{$address->state}}
                    {{$address->zip}}
                    </label>
                    <div>
                @endforeach
                <label>
                <input wire:model="addressId" type="radio" name="addressId" value="0"/> Create New
                </label>
                @if($addressId == 0)
                    <!-- if email and phone exist, autofill address below -->
                    <div class="form-input">
                        <label>Street</label>
                        <input wire:model.defer="street" type="text" name="street">
                    </div>

                    <div class="form-input">
                        <label>Suite</label>
                        <input wire:model.defer="suite" type="text" name="suite">
                    </div>

                    <div class="form-input">
                        <label>State</label>
                        <input wire:model.defer="state" type="text" name="state">
                    </div>

                    <div class="form-input">
                        <label>Zip</label>
                        <input wire:model.defer="zip" type="text" name="zip">
                    </div>
                @endif
            @endif
            <!-- end address-->
        @endif


    <span wire:click='resetCustomer'>Clear Customer</span>


        <div class="form-input">
            <label>Ticket</label> <input wire:model.defer='ticket' type="text" name="text"> <!-- change to checkbox -->
        </div>

        <div class="form-input">
            <label>Brand</label>
            <input wire:model='brand' type="text" list="brands" name="brand">
            <datalist id="brands" wire:model.defer='brand' name="brand">
                @foreach ($brands as $brand)
                    <option>{{ $brand->name }}</option>
                @endforeach
            </datalist>
            @error('brand') <span class="error">{{ $message }}</span> @enderror
        </div>
        @isset($products)
        <div class="form-input">
            <label>Product</label>
            <input wire:model.defer='product' type="text" list="products" name="product">
            <datalist id="products" wire:model.defer='product' name="product">
                @foreach ($products as $product)
                    <option>{{$product->stock_number }} {{ $product->name }}</option>
                @endforeach
            </datalist>
            @error('product') <span class="error">{{ $message }}</span> @enderror
        </div>
        @endif
        {{-- <div class="form-input">
            <label>Stock Number</label> <input wire:model.defer='stockNumber' type="text" name="stocknumber">
        </div>

        <div class="form-input">
            <label>Product Name</label> <input wire:model.defer='product' type="text" name="productname">
        </div> --}}

        <div class="form-input">
            <label>Size</label> <input wire:model.defer='size' type="text" name="size">
        </div>

        <div class="form-input">
            <label>Price</label> <input wire:model.defer='price' type="text" name="price">
        </div>

        <div class="form-input">
            <label>Deposit</label> <input wire:model.defer='deposit' type="text" name="deposit">
        </div>

        <div class="form-input">
            <label>Paid</label> <input wire:model.defer='paid' type="text" name="paid"> <!-- change to checkbox -->
        </div>

        <div class="form-input">
            <label>Comment</label> <input wire:model.defer='comment' type="text" name="comment"> <!-- change to checkbox -->
        </div>

</div>

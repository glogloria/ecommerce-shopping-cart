<section>
    <form method="POST" action="{{ route('address.store') }}">
        @csrf

        <div class="address-form">
            <h1 class="text-2xl font-bold mb-4">Add Address</h1>
            <!-- Street -->
            <div class="">
                <x-input-label for="street" :value="__('Street')" />
                <x-text-input id="street" class="w-full p-2 border rounded" type="text" name="street" :value="old('street')" required autofocus/>
                <x-input-error :messages="$errors->get('street')" class="mt-2" />
            </div>

            <!-- Unit number -->
            <div>
                <x-input-label for="unit_number" :value="__('unit_number')" />
                <x-text-input id="unit_number" class="w-full p-2 border rounded" type="text" name="unit_number" :value="old('unit_number')" autofocus/>
                <x-input-error :messages="$errors->get('unit_number')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" class="w-full p-2 border rounded" type="city" name="city" :value="old('city')" required/>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- State -->
            <div class="mt-4">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="w-full p-2 border rounded" type="state" name="state" :value="old('state')" required/>
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <!-- Zip -->
            <div class="mt-4">
                <x-input-label for="zip" :value="__('Zip')" />
                <x-text-input id="zip" class="w-full p-2 border rounded" type="zip" name="zip" :value="old('zip')" required/>
                <x-input-error :messages="$errors->get('zip')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <button type="submit" class="full px-4 py-2 bg-white text-black rounded">
                    Add Address
                </button>
            </div>
        </div>
    </form>
<section>

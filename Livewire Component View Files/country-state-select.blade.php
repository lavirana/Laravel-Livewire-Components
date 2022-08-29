<div>
    <div class="mb-3">
    <label for="country" class="form-label">Country</label>
        <select class="form-select mb-3" aria-label="Country select box" wire:model="country">
        <option selected>Select Country</option>
        @foreach($countries as $countryKey => $countryValue)
            <option value="{{$countryKey}}">{{$countryValue}}</option>
        @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="state" class="form-label">State</label>
        <select class="form-select" aria-label="State select box" wire:model="state" wire:loading.attr="disabled" wire:target="country">
        <option selected>Select State</option>
        @foreach($states as $stateKey => $stateValue)
            <option value="{{$stateKey}}">{{$stateValue}}</option>
        @endforeach
        </select>
    </div>
</div>

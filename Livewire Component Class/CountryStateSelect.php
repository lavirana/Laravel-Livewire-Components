<?php

namespace App\Http\Livewire;

use Livewire\Component;
use CountryState;

class CountryStateSelect extends Component
{

    public array $countries;
    public array $states = [];

    public string $country = '';
    public string $state = '';

    public function render()
    {
        return view('livewire.country-state-select');
    }

    public function mount(){
        $this->countries = CountryState::getCountries();
    }

    public function updatedCountry($value)
    {
        $this->state = '';
        $this->states = CountryState::getStates($this->country);
    }
}

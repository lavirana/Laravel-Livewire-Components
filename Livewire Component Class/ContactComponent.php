<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactComponent extends Component
{
    public string $contactName = '';
    public string $contactEmail = '';
    public string $contactMessage = '';

    public function render()
    {
        return view('livewire.contact-component');
    }

    protected $rules = [
        'contactName' => 'required|min:6',
        'contactEmail' => 'required|email',
        'contactMessage' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        try{
            Mail::to('tushar@5balloons.info')->send(new ContactMail($this->contactName, $this->contactEmail, $this->contactMessage));
        }catch(\Exception $e){
            session()->flash('error', 'Oops ! Something went wrong');
            return;
        }

        session()->flash('success', 'Your message is in our inbox, A human will get back to you.');

        $this->reset();
    }
}

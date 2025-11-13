<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public $showModal = false;
    public $contact_id;

    public function render()
    {
        return view('livewire.admin');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


}

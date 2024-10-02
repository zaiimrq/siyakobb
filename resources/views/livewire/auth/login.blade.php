<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\UserForm;
use Mary\Traits\Toast;

new
#[Layout('components.layouts.guest')]
class extends Component {
    use Toast;

    public UserForm $form;

    public function save(){
        try {
            $this->form->isLogin = true;
            $this->form->validate();
            $this->form->login();
        } catch (\Throwable $th) {
            $this->form->validate();
            $this->error("Oops", $th->getMessage());
        }
    }
}; ?>

<div>
    <div class="container flex items-center justify-center">
        <x-card title="Login" subtitle="Enter your credentials to login." class="w-full md:w-[60%] lg:w-[50%] shadow-lg bg-gray-200 py-10 px-5" >
            <x-form wire:submit='save' no-separator class="mb-3" >
                <x-input wire:model='form.email' label="Email" icon="o-envelope" type="email" class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" />
                <x-input wire:model='form.password' label="Password" icon="o-key" type="password" class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" />
                <x-slot:actions>
                    <x-button label="Login" type="submit" class="w-full text-white bg-gray-600 btn hover:bg-gray-500" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-card>
    </div>
</div>

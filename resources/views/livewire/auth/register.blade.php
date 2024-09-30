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

    public function save()
    {
        $this->validate();
        if ($this->form->register()) {
            $this->success("Amazing", "Please login now !");
            return $this->redirectRoute('login', navigate: true);
        }
    }
}; ?>

<div >
    <div class="container flex items-center justify-center min-h-screen">
        <x-card title="Register" subtitle="Create your credentials to login." class="w-full md:w-[60%] lg:w-[50%] shadow-md" >
            <x-form wire:submit='save' no-separator class="mb-3">
                <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" wire:model='form.name' label="Name" icon="o-user" type="name" />
                <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" wire:model='form.email' label="Email" icon="o-envelope" type="email" />
                <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" wire:model='form.password' label="Password" icon="o-key" type="password" />
                <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" wire:model='form.password_confirmation' label="Password confirmation" icon="o-key" type="password" />
                <x-slot:actions>
                    <x-button label="Register" type="submit"  class="w-full text-white bg-gray-600 btn hover:bg-gray-500" spinner="save" />
                </x-slot:actions>
            </x-form>
            <span>
                {{ __("Already have an account?") }}
                <a wire:navigate href="{{ route('login') }}" class="link link-primary" >{{ __("Login") }}</a>
            </span>
        </x-card>
    </div>
</div>

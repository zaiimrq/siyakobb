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

<div >
    <div class="container flex items-center justify-center min-h-screen">
        <x-card title="Login" subtitle="Enter your credentials to login." class="w-full md:w-[60%] lg:w-[50%] shadow-md" >
            <x-form wire:submit='save' no-separator class="mb-3" >
                <x-input wire:model='form.email' label="Email" icon="o-envelope" type="email" />
                <x-input wire:model='form.password' label="Password" icon="o-key" type="password" />
                <x-slot:actions>
                    <x-button label="Login" type="submit" class="w-full btn btn-primary" spinner="save" />
                </x-slot:actions>
            </x-form>
            <span>
                {{ __("Don't have an account?") }}
                <a wire:navigate href="{{ route('register') }}" class="link link-primary" >{{ __("Register") }}</a>
            </span>
        </x-card>
    </div>
</div>

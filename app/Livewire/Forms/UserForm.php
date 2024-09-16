<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class UserForm extends Form
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public ?User $user = null;

    public bool $isLogin = false;

    public function rules()
    {
        return [
            'name' => $this->isLogin ? [] : ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email', $this->isLogin ? 'exists:users,email' : 'unique:users,email'],
            'password' => ['required', 'min:3', $this->isLogin ? '' : 'confirmed'],
            'password_confirmation' => $this->isLogin ? [] : ['required', 'min:3'],
        ];
    }

    public function register(): User
    {
        return User::query()->create($this->all());
    }

    public function login()
    {
        if (Auth::attempt($this->only('email', 'password'))) {
            request()->session()->regenerate();

            return redirect()->intended(route('items.index'));
        } else {
            throw new Exception('Email or password is wrong!');
        }
    }
}

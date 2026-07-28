<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class ContactUs extends Component
{
    public $fullname = '';
    public $phone = '';
    public $email = '';
    public $message = '';

    protected function rules()
    {
        return [

            'fullname' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'email' => 'nullable|email|max:255',

            'message' => 'required|string|max:5000',

        ];
    }

    public function save()
    {
        $this->validate();

        ContactMessage::create([
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
            'is_read' => 'false'
        ]);

        $this->reset([
            'fullname',
            'phone',
            'email',
            'message',
        ]);

        session()->flash('success', 'پیام شما با موفقیت ارسال شد.');
    }

    public function render()
    {
        $setting = Setting::first();
        return view('livewire.contact-us', compact('setting'));
    }
}

<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class ContactMessageManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $contactMessageId;

    public $fullname = '';
    public $phone = '';
    public $email = '';
    public $message = '';
    public $isRead = '';

    public $showModal = false;

    protected function rules()
    {
        return [
            'fullname' => 'required|min:2',
            'phone'  => 'required|max:12',
            'email'      => 'required|email',
            'message' => 'required|max:255',
            'isRead' => 'required'
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit(int $id)
    {
        $contactMessage = ContactMessage::findOrFail($id);

        $this->contactMessageId = $contactMessage->id;

        $this->fullname = $contactMessage->fullname;
        $this->phone = $contactMessage->phone;
        $this->email = $contactMessage->email;
        $this->message = $contactMessage->message;
        $this->isRead = $contactMessage->is_read;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        ContactMessage::updateOrCreate(

            ['id' => $this->contactMessageId],

            [
                'fullname' => $this->fullname,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message,
                'is_read' => $this->isRead,
            ]

        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete(int $id)
    {
        ContactMessage::findOrFail($id)->delete();

        session()->flash('success', 'کاربر حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'contactMessageId',
            'fullname',
            'phone',
            'email',
            'message',
            'isRead'
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $contactMessages = ContactMessage::query()

            ->where(function ($query) {

                $query->where('fullname', 'like', "%{$this->search}%")

                    ->orWhere('phone', 'like', "%{$this->search}%")

                    ->orWhere('email', 'like', "%{$this->search}%")
                    
                    ->orWhere('is_read', 'like', "%{$this->search}%");
            })

            ->latest()

            ->paginate(10);

        return view('livewire.contact-message-management', compact('contactMessages'));
    }
}

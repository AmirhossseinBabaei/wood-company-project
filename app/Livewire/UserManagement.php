<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class UserManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $userId;

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';

    public $showModal = false;

    protected function rules()
    {
        return [
            'first_name' => 'required|min:2',
            'last_name'  => 'required|min:2',
            'email'      => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'required|min:5'
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
        $user = User::findOrFail($id);

        $this->userId = $user->id;

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->email = $user->email;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        User::updateOrCreate(

            ['id' => $this->userId],

            [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,

                'password' => $this->password
                    ? bcrypt($this->password)
                    : optional(User::find($this->userId))->password
            ]

        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete(int $id)
    {
        User::findOrFail($id)->delete();

        session()->flash('success', 'کاربر حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'userId',
            'first_name',
            'last_name',
            'email',
            'password'
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $users = User::query()

            ->where(function ($query) {

                $query->where('first_name', 'like', "%{$this->search}%")

                    ->orWhere('last_name', 'like', "%{$this->search}%")

                    ->orWhere('email', 'like', "%{$this->search}%");
            })

            ->latest()

            ->paginate(10);

        return view('livewire.user-management', compact('users'));
    }
}

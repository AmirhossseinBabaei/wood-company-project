<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class MenuManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $menuId;

    public $parentId;
    public $fa_title = '';
    public $en_title = '';
    public $fa_url = '';
    public $en_url = '';
    public $sortOrder = '';
    public $status = '';
    public $position = '';

    public $showModal = false;

    protected function rules()
    {
        return [
            'parentId' => 'nullable|exists:menus,id',
            'fa_title'  => 'required|min:3',
            'en_title'  => 'required|min:3',
            'fa_url'  => 'required|min:3',
            'en_url'  => 'required|min:3',
            'sortOrder'  => 'required',
            'status'  => 'required|in:active,inactive',
            'position'  => 'required|in:header,footer',
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
        $menu = Menu::with('parent')->findOrFail($id);

        $this->menuId = $menu->id;

        $this->fa_title = $menu->fa_title;
        $this->en_title = $menu->en_title;
        $this->fa_url = $menu->fa_url;
        $this->en_url = $menu->en_url;
        $this->sortOrder = $menu->sort_order;
        $this->status = $menu->status;
        $this->position = $menu->position;

        $this->showModal = true;
    }

    public function save()
    {
        // $this->validate();

        Menu::updateOrCreate(

            ['id' => $this->menuId],

            [
                'fa_title' => $this->fa_title,
                'en_title' => $this->en_title,
                'fa_url' => $this->fa_url,
                'en_url' => $this->en_url,
                'sort_order' => $this->sortOrder,
                'status' => $this->status,
                'position' => $this->position,
                'parent_id' => null,
            ]

        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete(int $id)
    {
        Menu::findOrFail($id)->delete();

        session()->flash('success', 'کاربر حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'menuId',
            'fa_title',
            'en_title',
            'fa_url',
            'en_url',
            'sortOrder',
            'status',
            'position',
            'parentId'
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $menus = Menu::with('parent')
            ->where(function ($query) {
                $query->where('fa_title', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        $parents = Menu::orderBy('fa_title')->get();

        return view(
            'livewire.menu-management',
            compact('menus', 'parents')
        );
    }
}

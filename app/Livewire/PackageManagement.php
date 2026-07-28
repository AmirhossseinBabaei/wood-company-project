<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class PackageManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $packageId;

    public $parentId;
    public $fa_title = '';
    public $en_title = '';
    public $weight = '';

    public $showModal = false;

    protected function rules()
    {
        return [
            'fa_title'  => 'required|min:3',
            'en_title'  => 'required|min:3',
            'weight'  => 'required|integer',
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
        $package = Package::findOrFail($id);

        $this->packageId = $package->id;

        $this->fa_title = $package->fa_title;
        $this->en_title = $package->en_title;
        $this->weight = $package->weight;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        Package::updateOrCreate(

            ['id' => $this->packageId],

            [
                'fa_title' => $this->fa_title,
                'en_title' => $this->en_title,
                'weight' => $this->weight,
            ]

        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete(int $id)
    {
        Package::findOrFail($id)->delete();

        session()->flash('success', 'کاربر حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'packageId',
            'fa_title',
            'en_title',
            'weight',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $packages = Package::where(function ($query) {

            $query->where('fa_title', 'like', "%{$this->search}%")
                ->Orwhere('en_title', 'like', "%{$this->search}%")
                ->orWhere('weight', 'like', "%{$this->search}%");
        })
            ->latest()
            ->paginate(10);

        return view(
            'livewire.package-management',
            compact('packages')
        );
    }
}

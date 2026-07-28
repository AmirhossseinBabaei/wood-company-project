<?php

namespace App\Livewire;

use App\Models\Industry;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class IndustryManagement extends Component
{
    use WithFileUploads, WithPagination;

    public $industryId;

    public $fa_name = '';
    public $en_description = '';

    public $en_name = '';
    public $fa_description = '';


    public $logo;

    public $showModal = false;

    protected function rules()
    {
        return [
            'fa_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',

            'fa_description' => 'required|string',
            'en_description' => 'required|string',

            'logo' => 'required|image|max:20048',
        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit($id)
    {
        $industry = Industry::findOrFail($id);

        $this->industryId = $industry->id;
        $this->fa_name = $industry->fa_name;
        $this->fa_description = $industry->fa_description;

        $this->en_name = $industry->fa_name;
        $this->en_description = $industry->fa_description;

        $this->logo = $industry->logo;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $logoPath = $this->logo->store('industry', 'public');

        Industry::updateOrCreate(
            ['id' => $this->industryId],
            [
                'fa_name' => $this->fa_name,
                'fa_description' => $this->fa_description,
                'en_name' => $this->en_name,
                'en_description' => $this->en_description,
                'logo' => $logoPath,
            ]
        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete($id)
    {
        Industry::findOrFail($id)->delete();

        session()->flash('success', 'رکورد با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'industryId',
            'fa_name',
            'fa_description',
            'en_name',
            'en_description',
            'logo',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $industries = Industry::latest()->paginate(10);

        return view('livewire.industry-management', compact('industries'));
    }
}

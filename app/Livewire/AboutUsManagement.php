<?php

namespace App\Livewire;

use App\Models\AboutUs;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class AboutUsManagement extends Component
{

    use WithFileUploads, WithPagination;

    public $aboutId;

    public $fa_title = '';
    public $fa_description = '';

    public $en_title = '';
    public $en_description = '';

    public $image;

    public $showModal = false;

    protected function rules()
    {
        return [
            'fa_title' => 'required|string|max:255',
            'fa_description' => 'required|string',

            'en_title' => 'required|string|max:255',
            'en_description' => 'required|string',

            'image' => 'required|image|max:2048',
        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);

        $this->aboutId = $about->id;
        $this->fa_title = $about->fa_title;
        $this->en_description = $about->en_description;

        $this->en_title = $about->en_title;
        $this->fa_description = $about->fa_description;

        $this->image = $about->image;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->image->store('about-us', 'public');

        AboutUs::updateOrCreate(
            ['id' => $this->aboutId],
            [
                'fa_title' => $this->fa_title,
                'fa_description' => $this->fa_description,  
                'en_title' => $this->en_title,
                'en_description' => $this->en_description,
                'image' => $imagePath,
            ]
        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete($id)
    {
        AboutUs::findOrFail($id)->delete();

        session()->flash('success', 'رکورد با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'aboutId',
            'fa_title',
            'fa_description',
            'en_title',
            'en_description',
            'image',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $abouts = AboutUs::latest()->paginate(10);

        return view('livewire.about-us-management', compact('abouts'));
    }
}
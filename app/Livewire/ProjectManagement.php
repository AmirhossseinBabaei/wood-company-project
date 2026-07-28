<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class ProjectManagement extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $projectId = null;

    public $fa_title = '';
    public $en_title = '';

    public $image;

    public $from_date = '';
    public $to_date = '';

    public $fa_location = '';
    public $en_location = '';

    public $currentImage = null;

    public $showModal = false;

    protected function rules()
    {
        return [

            'fa_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',

            'image' => $this->projectId
                ? 'nullable|image|max:2048'
                : 'required|image|max:2048',

            'from_date' => 'required|date',

            'to_date' => 'required|date|after_or_equal:from_date',

            'fa_location' => 'required|string|max:255',
            'en_location' => 'required|string|max:255',

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

    public function edit($id)
    {
        $item = Project::findOrFail($id);

        $this->projectId = $item->id;
        $this->fa_title = $item->fa_title;
        $this->en_title = $item->en_title;
        $this->from_date = $item->from_date;
        $this->to_date = $item->to_date;
        $this->fa_location = $item->fa_location;
        $this->en_location = $item->en_location;

        $this->currentImage = $item->image;
        $this->image = null;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $project = Project::find($this->projectId);

        $imagePath = $project?->image;

        if ($this->image) {

            if (
                $imagePath &&
                Storage::disk('public')->exists($imagePath)
            ) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $this->image->store('projects', 'public');
        }

        Project::updateOrCreate(

            ['id' => $this->projectId],

            [

                'fa_title' => $this->fa_title,
                'en_title' => $this->en_title,

                'image' => $imagePath,

                'from_date' => $this->from_date,
                'to_date' => $this->to_date,

                'fa_location' => $this->fa_location,
                'en_location' => $this->en_location,

            ]

        );

        $this->showModal = false;

        $this->resetForm();

        $this->resetPage();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);

        if (
            $project->image &&
            Storage::disk('public')->exists($project->image)
        ) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        session()->flash('success', 'با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'projectId',
            'fa_title',
            'en_title',
            'image',
            'currentImage',   
            'from_date',
            'to_date',
            'fa_location',
            'en_location'
        ]);

        $this->resetValidation();
    }
    public function render()
    {
        $projects = Project::where(function ($query) {

            $query->where('fa_title', 'like', "%{$this->search}%")
                ->orWhere('en_title', 'like', "%{$this->search}%")
                ->orWhere('fa_location', 'like', "%{$this->search}%")
                ->orWhere('en_location', 'like', "%{$this->search}%");
        })
            ->latest()
            ->paginate(10);

        return view(
            'livewire.project-management',
            compact('projects')
        );
    }
}

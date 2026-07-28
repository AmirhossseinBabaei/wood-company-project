<?php

namespace App\Livewire;

use App\Models\Collaboration;
use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class ProjectAndCollaborationsPage extends Component
{
    public function render()
    {
        $projects = Project::all();
        $collaborations = Collaboration::all();
        
        return view('livewire.project-and-collaborations-page', compact('projects', 'collaborations'));
    }
}

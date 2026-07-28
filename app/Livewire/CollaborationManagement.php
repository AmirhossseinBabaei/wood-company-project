<?php

namespace App\Livewire;

use App\Models\Collaboration;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class CollaborationManagement extends Component
{
    use WithFileUploads, WithPagination;


    public $collaborationId;


    public $fa_title = '';
    public $fa_description = '';

    public $en_title = '';
    public $en_description = '';


    public $image;

    public $currentImage;


    public $showModal = false;



    protected function rules()
    {
        return [

            'fa_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',

            'fa_description' => 'required|string',
            'en_description' => 'required|string',

            'image' => $this->collaborationId
                ? 'nullable|image|max:2048'
                : 'required|image|max:2048',

        ];
    }




    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }




    public function edit($id)
    {

        $collaboration = Collaboration::findOrFail($id);


        $this->collaborationId = $collaboration->id;


        $this->fa_title = $collaboration->fa_title;
        $this->fa_description = $collaboration->fa_description;


        $this->en_title = $collaboration->en_title;
        $this->en_description = $collaboration->en_description;


        $this->currentImage = $collaboration->image;


        $this->image = null;


        $this->showModal = true;

    }





    public function save()
    {

        $this->validate();



        $data = [

            'fa_title' => $this->fa_title,

            'fa_description' => $this->fa_description,


            'en_title' => $this->en_title,

            'en_description' => $this->en_description,

        ];



        if($this->image)
        {

            $data['image'] = $this->image->store('collaboration-us','public');

        }




        Collaboration::updateOrCreate(

            [
                'id'=>$this->collaborationId
            ],

            $data

        );



        $this->showModal=false;


        $this->resetForm();


        session()->flash('success','عملیات با موفقیت انجام شد.');

    }




    public function delete($id)
    {

        Collaboration::findOrFail($id)->delete();


        session()->flash('success','رکورد حذف شد.');

    }




    public function resetForm()
    {

        $this->reset([

            'collaborationId',

            'fa_title',
            'fa_description',

            'en_title',
            'en_description',

            'image',

            'currentImage',

        ]);


        $this->resetValidation();

    }





    public function render()
    {

        $collaborations = Collaboration::latest()->paginate(10);


        return view(
            'livewire.collaboration-management',
            compact('collaborations')
        );

    }

}
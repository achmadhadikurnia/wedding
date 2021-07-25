<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $model;
    public $item_id;
    public $search;

    public function __construct()
    {
        $this->model = new Contact;
    }

    public function render()
    {
        $data = $this->model::query()
            ->when($this, function ($query) {
                $query->where(function ($query) {
                    $query->orWhere('name', 'like', "%{$this->search}%");
                    $query->orWhere('phone', 'like', "%{$this->search}%");
                    $query->orWhere('job_title', 'like', "%{$this->search}%");
                    $query->orWhere('address', 'like', "%{$this->search}%");
                });
            })
            ->oldest('name')
            ->paginate(10);
        $i = $data->firstItem() - 1;

        return view('livewire.contacts', compact('data', 'i'));
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $this->setId($id);
    }

    public function delete($id)
    {
        $this->setId($id);
        $this->item->delete();

        session()->flash('success', __('Deleted'));
    }

    public function setId($id = null)
    {
        $this->item_id = $id;
    }

    public function getItemProperty()
    {
        return $this->model::find($this->item_id);
    }
}

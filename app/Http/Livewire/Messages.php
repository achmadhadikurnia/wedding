<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $model;
    public $item_id;
    public $search;

    public function __construct()
    {
        $this->model = new Message;
    }

    public function render()
    {
        $data = $this->model::query()
            ->when($this, function ($query) {
                $query->where(function ($query) {
                    $query->orWhere('name', 'like', "%{$this->search}%");
                    $query->orWhere('message', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate(10);
        $i = $data->firstItem() - 1;

        return view('livewire.messages', compact('data', 'i'));
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
        return $this->model::findOrFail($this->item_id);
    }
}

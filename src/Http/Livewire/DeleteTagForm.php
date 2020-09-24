<?php

namespace Marketplaceful\Http\Livewire;

use Livewire\Component;
use Marketplaceful\Actions\DeleteTag;

class DeleteTagForm extends Component
{
    public $tag;

    public $confirmingTagDeletion = false;

    public function mount($tag)
    {
        $this->tag = $tag;
    }

    public function deleteTag(DeleteTag $deleter)
    {
        $deleter->delete($this->tag);

        return redirect()->route('marketplaceful::tags.index');
    }

    public function render()
    {
        return view('marketplaceful::tags.delete-tag-form');
    }
}

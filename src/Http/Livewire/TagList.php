<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TagList extends Component
{
    public Collection $tags;

    public function mount($tags)
    {
        $this->tags = $tags;
    }

    public function render()
    {
        return view('marketplaceful::tags.tag-list');
    }
}

<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $title;
    public Collection $options;
    public string $multiple;
    private mixed $selected;

    public function __construct($name, $title, $options, $multiple='')
    {
        $this->name = $name;
        $this->title = $title;
        $this->options = $options;
        $this->multiple = $multiple;
        $fieldName = str_replace(['[', ']'], '', $name);
        $this->selected = request($fieldName);
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.select');
    }

    public function isSelected($id): bool
    {
        if (is_array($this->selected)){
            return in_array($id, $this->selected);
        }
        return $id == $this->selected;
    }
}

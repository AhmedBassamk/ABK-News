<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class articleTable extends Component
{
    public $fillableFields;

    /**
     * Create a new component instance.
     *
     * @param  array
     * @return void
     */
    public function __construct()
    {
        $data_items = new Article();
        // Get the fillable fields as an array
        $fillableFields = $data_items->getFillable();
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_push($fillableFields, 'image');
        array_push($fillableFields, 'admin');
        array_push($fillableFields, 'action');
        $array = array_diff($fillableFields, ['description']);
        $array = array_diff($fillableFields, ['user_id']);
        $this->fillableFields = array_values($array); // تخصيص القيم الجديدة للخاصية fillableFields
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-table');
    }
}

<?php

namespace App\View\Components;

use App\Models\news;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class newsTable extends Component
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
        $data_items = new news();
        // Get the fillable fields as an array
        $fillableFields = $data_items->getFillable();
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_push($fillableFields, 'views count');
        array_push($fillableFields, 'category');
        array_push($fillableFields, 'Admin');
        array_push($fillableFields, 'action');
        $array = array_diff($fillableFields, ['description']);
        $this->fillableFields = array_values($array); // تخصيص القيم الجديدة للخاصية fillableFields

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-table');
    }
}

<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryTable extends Component
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
        $data_items = new Category();
        // Get the fillable fields as an array
        $fillableFields = $data_items->getFillable();
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_pop($fillableFields);
        array_push($fillableFields , 'parent category');
        array_push($fillableFields , 'action');
        $array = array_diff($fillableFields, ['description']);
        $this->fillableFields = array_values($array);
        // Get all the courses records from the database
        // $data_items_ = Country::all();
       //  $this->data_table = $data_table; // Assign the data received from the Controller to the component's property
       //  $this->fillableFields = $fillableFields; // Assign the fillable fields array to the component's property
       //  $this->data_table_category = $data_items_; // Assign the data received from the Controller to the component's property
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-table');
    }
}

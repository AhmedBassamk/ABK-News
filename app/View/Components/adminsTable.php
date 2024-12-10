<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminsTable extends Component
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
        $data_admins = new User();
        $fillableFields = $data_admins->getFillable();
        array_unshift($fillableFields, 'id');
        $fillableFields = array_diff($fillableFields, ['password']);
        $this->fillableFields = $fillableFields;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admins-table');
    }
}

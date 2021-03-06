<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class ScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Schedule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/schedule');
        CRUD::setEntityNameStrings('schedule', 'schedules');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'Restaurant',
            'type' => 'select', 
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addColumn([
            'label' => 'Weekday',
            'type' => 'text', 
            'name' => 'weekday',
            ]);
        CRUD::addColumn([
            'label' => 'Open',
            'type' => 'time', 
            'name' => 'open',
            ]);
        CRUD::addColumn([
            'label' => 'Close',
            'type' => 'time', 
            'name' => 'close',
            ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ScheduleRequest::class);

        CRUD::addField([
            'label' => 'Restaurant',
            'type' => 'select', 
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addField([
            'label' => 'Weekday',
            'type' => 'select2_from_array', 
            'name' => 'weekday',
            'options' => ['monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday', 'sunday' => 'Sunday'],
            ]);
        CRUD::addField([
            'label' => 'Open',
            'type' => 'time', 
            'name' => 'open',
            ]);
        CRUD::addField([
            'label' => 'Close',
            'type' => 'time', 
            'name' => 'close',
            ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

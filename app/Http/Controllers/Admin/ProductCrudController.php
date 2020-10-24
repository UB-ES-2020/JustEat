<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
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
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'relationship', 
            ]);
        CRUD::addColumn([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number', 
            'decimals' => 2,
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
        CRUD::setValidation(ProductRequest::class);

        CRUD::addField([
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number', 
            'decimals' => 2,
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

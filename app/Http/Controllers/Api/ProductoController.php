<?php

namespace App\Http\Controllers\Api;

use App\Models\Producto;
use App\Http\Resources\ProductoResource;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use Harryes\CrudPackage\Http\Controllers\CrudBaseController;

class ProductoController extends CrudBaseController
{
    /**
     * Constructor to bind the model and resource class to the BaseController.
     */
    public function __construct()
    {
        parent::__construct(
            Producto::class,
            ProductoResource::class,
            ProductoStoreRequest::class,
            ProductoUpdateRequest::class
        );
    }
}
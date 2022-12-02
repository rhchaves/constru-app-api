<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Models\PurchaseOrderItems;
use Illuminate\Http\Request;

class PurchaseOrderItemsController extends MasterApiController
{
    protected $model;
    protected $path;
    protected $upload;

    public function __construct(PurchaseOrderItems $purchaseOrderItems, Request $request) {
        $this->model = $purchaseOrderItems;
        $this->request = $request;
    }

    public function purchaseOrder($id)
    {
        if (!$data = $this->model->with('purchaseOrderItems')->find($id)) {
            return response()->json(['error', 'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }
}

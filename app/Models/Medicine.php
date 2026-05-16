<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $fillable = [
        'medicineName',
        'genericName',
        'manufacturer',
        'category',
        'medicineType',
        'packSize',
        'unitQuantity',
        'prescriptionRequired',
        'description',
        'mrp',
        'sellingPrice',
        'discount',
        'gst',
        'stockQuantity',
        'minStock',
        'batchNumber',
        'expiryDate',
        'uses',
        'dosageInstructions',
        'sideEffects',
        'precautions',
        'composition',
        'storageConditions',
        'drugSchedule',
        'status',
        'image', // for your uploads/VtNrBZiESv0188IVLCXIndbzDrd8Sb28umZc1cwB.jpg
    ];
}

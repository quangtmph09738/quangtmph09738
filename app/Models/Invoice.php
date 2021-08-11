<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected $primatyKey = "id";
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'total_price',
        'status'
    ];
    public function invoiceDetails(){
        //hasMany cos nhieeuf
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    ////accsessor
    // public function getTotalPriceAttribute($value){
    //     $newValue = $this->attribute['total_price'].'VND';
    //     return $newValue;
    // }
}

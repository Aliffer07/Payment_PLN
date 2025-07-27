<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meter_number',
        'kwh_usage',
        'price_per_kwh',
        'total_amount',
        'invoice_number',
        'payment_status',
        'payment_receipt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk generate Invoice Number
    public static function generateInvoiceNumber()
    {
        $prefix = 'INV';
        $date = now()->format('Ymd');
        $randomStr = strtoupper(substr(md5(microtime()), 0, 6));

        return $prefix . $date . $randomStr;
    }
}

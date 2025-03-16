<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category', 'amount', 'date', 'description', 'category_id', 'receipt_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}


    public function getReceiptUrlAttribute(){
        return $this->receipt_path ? Storage::disk('s3')->temporaryUrl($this->receipt_path, now()->addMinutes(5)) : null;
    }

}

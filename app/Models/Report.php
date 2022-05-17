<?php

namespace App\Models;

use App\Models\ReportStatusHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function reportStatusHistories(){
        return $this->hasMany(ReportHistory::class);
    }
    
}

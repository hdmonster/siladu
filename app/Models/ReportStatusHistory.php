<?php

namespace App\Models;

use App\Models\User;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportStatusHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['report'];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function admin(){
        return $this->belongsTo(User::class);
    }
}

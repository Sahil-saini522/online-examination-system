<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  
     public function subject(){
        return $this->hasMany(Subject::class, 'id', 'subject_id');
     }



}

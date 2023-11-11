<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TODO extends Model
{
    use HasFactory;

    private $limit = 10;
    private $page = 0;



}

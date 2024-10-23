<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardList extends Model
{
    /** @use HasFactory<\Database\Factories\BoardListFactory> */
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'user_id',
    //     'board_id',
    // ];

    // protected $casts = [
    //     'user_id' => 'integer',
    //     'board_id' => 'integer',
    //     'name' => 'string',
    // ];

    // protected $hidden = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    //     'deleted_at' => 'datetime',
    // ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'pelanggan';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'pelanggan_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'outlet',
        'alamat',
        'no_telp',
        'created_at',
        'updated_at'
    ];
}

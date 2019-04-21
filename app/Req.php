<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    //
    protected $table = 'req';
    protected $primaryKey = 'request_id';
    protected $fillable = [
        'request_submit_by',
        'request_oleh',
        'request_desc',
        'request_done_at',
        'request_done_by'
      ];

}

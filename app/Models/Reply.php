<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favorable, RecordsActivity;
    protected $guarded = [];
    protected $with=['owner', 'favorites'];
    use HasFactory;

    public function owner()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    public function path(){
        return $this->thread->path() . "#reply-{$this->id}";
    }

}

<?php
namespace App\Filters;

use App\Models\User;
use Illuminate\Http\Request;


class ThreadFilters extends Filters {

    protected $filters= ['by', 'popular'];
    /**
     * @param mixed $username
     * @param $builder
     * @return mixed
     */
    public function by(mixed $username): mixed
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }
    public function popular(){
        $this->builder->getQuery()->orders=[];
        return $this->builder->orderBy('replies_count', 'desc');
    }
}

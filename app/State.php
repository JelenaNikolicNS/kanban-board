<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'limit',
    ];

    protected $name;
    protected $limit;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNameAttribute()
    {
        return $this->name;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getLimitAttribute()
    {
        return $this->limit;
    }
}

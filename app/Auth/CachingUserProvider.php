<?php
namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class CachingUserProvider extends EloquentUserProvider
{

    protected $cache;


    public function __construct(HasherContract $hasher, $model, Repository $cache)
    {
        $this->model = $model;
        $this->hasher = $hasher;
        $this->cache = $cache;
    }


    public function retrieveById($identifier)
    {
        if (!$this->cache->has('user_by_id_'.$identifier)) {

            $model = $this->createModel();
            $result = $model->newQuery()
                ->with('roles.permissions')
                ->where($model->getAuthIdentifierName(), $identifier)
                ->first();

            $this->cache->put('user_by_id_'.$identifier, $result, 60);

            $return = $this->cache->get('user_by_id_'.$identifier);
            return $return;

        }
        else{

            return $this->cache->get('user_by_id_'.$identifier);

        }

        
    }
}
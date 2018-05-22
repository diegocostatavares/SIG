<?php
namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserAmended;
use Illuminate\Contracts\Cache\Repository;

class ClearUserId
{

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    public function handle(UserAmended $event)
    {
        $this->cache->pull('user_by_id_'.$event->model->id_user);
    }
}
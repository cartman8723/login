<?php

namespace App\Repositories\Eloquent;

use App\Models\App;
use App\Repositories\Contracts\AppInterface;

class AppRepository implements AppInterface
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function getAllApps()
    {
        return $this->app->all();
    }

    public function getAllAppsFilter()
    {
        return $this->app->paginate(10);
    }

    public function getAppByName($name)
    {
        return $this->app->where('name', '=', $name)->first();
    }

    public function getAppById($id)
    {
        return $this->app->find($id);
    }

}

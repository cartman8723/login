<?php

namespace App\Repositories\Contracts;

interface AppInterface
{
    public function getAllApps();
    public function getAllAppsFilter();
    public function getAppByName($name);
    public function getAppById($id);
}

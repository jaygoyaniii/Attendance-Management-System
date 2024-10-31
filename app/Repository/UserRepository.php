<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Factory\AbstractFactory;
use App\Models\Factory\UserFactory;
use Carbon\Carbon;


class UserRepository extends BaseRepository
{
    public function __construct(UserFactory $model)
    {
        $this->modelFactory = $model;
        parent::__construct($model);
    }

}

?>

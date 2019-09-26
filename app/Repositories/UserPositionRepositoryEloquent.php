<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserPositionRepository;
use App\Entities\UserPosition;
use App\Validators\UserPositionValidator;

/**
 * Class UserPositionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserPositionRepositoryEloquent extends BaseRepository implements UserPositionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserPosition::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

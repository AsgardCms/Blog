<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Category;
use Modules\Bocian\Support\EloquentRepositoryHelper;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class CategoryRepository extends EloquentBaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    use EloquentRepositoryHelper;
}

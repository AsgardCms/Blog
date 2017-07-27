<?php

namespace Modules\Blog\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class PostIsCreating extends AbstractEntityHook implements EntityIsChanging
{
}

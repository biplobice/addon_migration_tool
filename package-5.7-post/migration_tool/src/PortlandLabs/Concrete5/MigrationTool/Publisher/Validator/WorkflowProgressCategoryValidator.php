<?php

namespace PortlandLabs\Concrete5\MigrationTool\Publisher\Validator;

use Concrete\Core\Conversation\FlagType\FlagType;
use Concrete\Core\Page\Template;

class WorkflowProgressCategoryValidator extends AbstractValidator
{

    public function skipItem()
    {
        $type = \Concrete\Core\Workflow\Progress\Category::getByHandle($this->object->getHandle());
        return is_object($type);
    }

}

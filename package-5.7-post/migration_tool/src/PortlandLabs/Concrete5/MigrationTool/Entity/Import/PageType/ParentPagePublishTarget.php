<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageType;

use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\PageType\ParentPagePublishTargetFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\PermissionKey\GroupAccessEntityFormatter;
use PortlandLabs\Concrete5\MigrationTool\Batch\Validator\PageType\ParentPagePublishTargetValidator;
use PortlandLabs\Concrete5\MigrationTool\Batch\Validator\PermissionKey\GroupAccessEntityValidator;
use PortlandLabs\Concrete5\MigrationTool\Publisher\PublishableInterface;
use PortlandLabs\Concrete5\MigrationTool\Publisher\Validator\PermissionAccessEntityTypeValidator;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

/**
 * @Entity
 */
class ParentPagePublishTarget extends PublishTarget
{

    /**
     * @Column(type="string")
     */
    protected $path;

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getFormatter()
    {
        return new ParentPagePublishTargetFormatter($this);
    }

    public function getRecordValidator(Batch $batch)
    {
        return new ParentPagePublishTargetValidator($batch);
    }



}

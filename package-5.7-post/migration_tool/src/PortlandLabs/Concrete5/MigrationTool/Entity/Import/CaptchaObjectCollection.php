<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import;

use Doctrine\Common\Collections\ArrayCollection;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\AttributeTypeFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\BlockTypeFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\CaptchaFormatter;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter\PageTemplateFormatter;

/**
 * @Entity
 */
class CaptchaObjectCollection extends ObjectCollection
{

    /**
     * @OneToMany(targetEntity="Captcha", mappedBy="collection", cascade={"persist", "remove"})
     **/
    public $libraries;

    public function __construct()
    {
        $this->libraries = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getLibraries()
    {
        return $this->libraries;
    }

    public function getFormatter()
    {
        return new CaptchaFormatter($this);
    }

    public function getType()
    {
        return 'captcha_library';
    }

    public function hasRecords()
    {
        return count($this->getLibraries());
    }

    public function getRecords()
    {
        return $this->getLibraries();
    }

    public function getTreeFormatter()
    {
        return false;
    }

    public function getRecordValidator()
    {
        return false;
    }





}
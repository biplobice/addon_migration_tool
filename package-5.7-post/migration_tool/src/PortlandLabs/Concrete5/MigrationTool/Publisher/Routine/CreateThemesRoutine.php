<?php

namespace PortlandLabs\Concrete5\MigrationTool\Publisher\Routine;

use Concrete\Core\Attribute\Key\Category;
use Concrete\Core\Captcha\Library;
use Concrete\Core\Page\Theme\Theme;
use Concrete\Core\Workflow\Type;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

defined('C5_EXECUTE') or die("Access Denied.");

class CreateThemesRoutine implements RoutineInterface
{

    public function execute(Batch $batch)
    {

        $themes = $batch->getObjectCollection('theme');
        foreach($themes->getThemes() as $theme) {
            if (!$theme->getPublisherValidator()->skipItem()) {
                $pkg = null;
                if ($theme->getPackage()) {
                    $pkg = \Package::getByHandle($theme->getPackage());
                }
                $t = Theme::add($theme->getHandle(), $pkg);
                if ($theme->getIsActivated()) {
                    $t->applyToSite();
                }
            }
        }
    }

}

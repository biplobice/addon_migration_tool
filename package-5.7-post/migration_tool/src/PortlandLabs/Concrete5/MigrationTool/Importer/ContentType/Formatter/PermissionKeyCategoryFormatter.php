<?php

namespace PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Formatter;

defined('C5_EXECUTE') or die("Access Denied.");

class PermissionKeyCategoryFormatter extends AbstractFormatter
{

    public function getPluralDisplayName()
    {
        return t('Permission Categories');
    }
}


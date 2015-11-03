<?php

namespace PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\Type;

use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Area;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Attribute;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Block;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\Editor;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\EditorObjectCollection;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\RatingType;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Conversation\RatingTypeObjectCollection;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageAttribute;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageObjectCollection;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageTemplate as CorePageTemplate;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\PageTemplateObjectCollection;
use PortlandLabs\Concrete5\MigrationTool\Importer\ContentType\TypeInterface;

defined('C5_EXECUTE') or die("Access Denied.");

class ConversationEditor implements TypeInterface
{

    protected $simplexml;

    public function getObjectCollection(\SimpleXMLElement $element)
    {
        $this->simplexml = $element;
        $collection = new EditorObjectCollection();
        if ($this->simplexml->conversationeditors->editor) {
            foreach($this->simplexml->conversationeditors->editor as $node) {
                $editor = new Editor();
                $editor->setHandle((string) $node['handle']);
                $editor->setName((string) $node['name']);
                if ((string) $node['activated'] == '1') {
                    $editor->setIsActive(true);
                }
                $editor->setPackage((string) $node['package']);
                $collection->getEditors()->add($editor);
                $editor->setCollection($collection);
            }
        }
        return $collection;
    }

}

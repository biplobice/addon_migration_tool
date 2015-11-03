<?php

namespace PortlandLabs\Concrete5\MigrationTool\Entity\Import\Permission;

use Doctrine\Common\Collections\ArrayCollection;
use PortlandLabs\Concrete5\MigrationTool\Batch\Formatter\PermissionKey\TreeJsonFormatter;
use PortlandLabs\Concrete5\MigrationTool\Publisher\PublishableInterface;
use PortlandLabs\Concrete5\MigrationTool\Publisher\Validator\PermissionKeyValidator;


/**
 * @Entity
 * @Table(name="MigrationImportPermissionKeys")
 */
class Key implements PublishableInterface
{

    public function __construct()
    {
        $this->access_entities = new ArrayCollection();
    }

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="KeyObjectCollection")
     **/
    protected $collection;

    /**
     * @OneToMany(targetEntity="AccessEntity", mappedBy="key", cascade={"persist", "remove"})
     **/
    protected $access_entities;

    /**
     * @Column(type="string")
     */
    protected $handle;

    /**
     * @Column(type="boolean")
     */
    protected $has_custom_class = false;

    /**
     * @Column(type="string")
     */
    protected $can_trigger_workflow = false;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string")
     */
    protected $category;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $package = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAccessEntities()
    {
        return $this->access_entities;
    }

    /**
     * @param mixed $access_entities
     */
    public function setAccessEntities($access_entities)
    {
        $this->access_entities = $access_entities;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param mixed $package
     */
    public function setPackage($package)
    {
        $this->package = $package;
    }

    /**
     * @return mixed
     */
    public function getHasCustomClass()
    {
        return $this->has_custom_class;
    }

    /**
     * @param mixed $has_custom_class
     */
    public function setHasCustomClass($has_custom_class)
    {
        $this->has_custom_class = $has_custom_class;
    }

    /**
     * @return mixed
     */
    public function getCanTriggerWorkflow()
    {
        return $this->can_trigger_workflow;
    }

    /**
     * @param mixed $can_trigger_workflow
     */
    public function setCanTriggerWorkflow($can_trigger_workflow)
    {
        $this->can_trigger_workflow = $can_trigger_workflow;
    }

    public function getPublisherValidator()
    {
        return new PermissionKeyValidator($this);
    }

    public function getFormatter()
    {
        return new TreeJsonFormatter($this);
    }

}

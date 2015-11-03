<?php

namespace PortlandLabs\Concrete5\MigrationTool\Publisher\Routine;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Job\Job;
use Concrete\Core\Page\Template;
use PortlandLabs\Concrete5\MigrationTool\Entity\Import\Batch;

defined('C5_EXECUTE') or die("Access Denied.");

class CreateJobsRoutine implements RoutineInterface
{

    public function execute(Batch $batch)
    {

        $jobs = $batch->getObjectCollection('job');
        foreach($jobs->getJobs() as $job) {
            if (!$job->getPublisherValidator()->skipItem()) {
                $pkg = null;
                if ($job->getPackage()) {
                    $pkg = \Package::getByHandle($job->getPackage());
                }
                if (is_object($pkg)) {
                    Job::installByPackage($job->getHandle(), $pkg);
                } else {
                    Job::installByHandle($job->getHandle());
                }
            }
        }
    }

}

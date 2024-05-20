<?php

namespace App\Doctrine\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class ActiveServiceFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if($targetEntity->getReflectionClass()->name != 'App\Entity\Service\Service') {
            return '';
        }

        return $targetTableAlias . '.active = true';
    }
}

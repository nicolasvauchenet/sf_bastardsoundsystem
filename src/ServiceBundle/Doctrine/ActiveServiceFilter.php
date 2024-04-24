<?php

namespace App\ServiceBundle\Doctrine;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class ActiveServiceFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if($targetEntity->getReflectionClass()->name != 'App\ServiceBundle\Entity\Service') {
            return '';
        }

        return $targetTableAlias . '.active = true';
    }
}

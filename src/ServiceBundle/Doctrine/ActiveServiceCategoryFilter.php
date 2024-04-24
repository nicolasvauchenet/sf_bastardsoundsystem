<?php

namespace App\ServiceBundle\Doctrine;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class ActiveServiceCategoryFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if($targetEntity->getReflectionClass()->name != 'App\ServiceBundle\Entity\Category') {
            return '';
        }

        return $targetTableAlias . '.active = true';
    }
}

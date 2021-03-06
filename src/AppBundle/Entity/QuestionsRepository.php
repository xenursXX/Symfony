<?php

namespace AppBundle\Entity;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;

/**
 * QuestionsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionsRepository extends EntityRepository
{
    public function findApi($id = null)
    {
        $qb = $this->createQueryBuilder('s') ;

        if (null !== $id){
            $qb
                ->where('s.id =  :id')
                ->setParameter(':id', $id, ':tag')

            ;
        }

        return null === $id
            ? $qb->getQuery()->getArrayResult()
            : $qb->getQuery()->getSingleResult(AbstractQuery::HYDRATE_ARRAY)

            ;
    }
}
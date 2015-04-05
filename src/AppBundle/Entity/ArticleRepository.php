<?php

namespace AppBundle\Entity;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr as Expr;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{

    /**
     * @param string $id
     * @return array
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function FindAllArticles($id = null)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a,t,c')
            ->leftJoin('a.tag', 't', Expr\Join::WITH)
            ->leftJoin('a.category', 'c', Expr\Join::WITH)
            ->orderBy('a.id', 'DESC');
        if(null !== $id) {
            $qb->where('a.id = :id')
                ->setParameters([
                    ':id' => $id,
                ]);
        }

        return null === $id
            ? $qb->getQuery()->getArrayResult()
            : $qb->getQuery()->getSingleResult(AbstractQuery::HYDRATE_ARRAY);
    }


}

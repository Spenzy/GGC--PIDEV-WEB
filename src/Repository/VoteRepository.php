<?php

namespace App\Repository;

use App\Entity\Vote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vote[]    findAll()
 * @method Vote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vote::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Vote $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Vote $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findVoteCountByPost(int $idPublication): ?int
    {
        $nbrV = -1;
        try {
             $upvote = $this->createQueryBuilder('v')
                ->Where(':idPub = v.idpublication')
                 ->andWhere('v.type LIKE :UP')->setParameter('UP','UP')
                ->setParameter('idPub', $idPublication)
                ->Select('count(v.idclient)')
                ->getQuery()
                ->getSingleScalarResult();

            $downvote = $this->createQueryBuilder('v')
                ->Where(':idPub = v.idpublication')
                ->andWhere('v.type LIKE :DOWN')->setParameter('DOWN','DOWN')
                ->setParameter('idPub', $idPublication)
                ->Select('count(v.idclient)')
                ->getQuery()
                ->getSingleScalarResult();
            $nbrV = $upvote - $downvote;
            return $nbrV;
        } catch (NoResultException|NonUniqueResultException $e) {
        }

        return $nbrV;
       /* return $this->getEntityManager()->createQuery('select count(v) from App\Entity\Vote v where v.idpublication = :idpub')
                ->setParameter('idpub',$idPublication)->getSingleScalarResult();*/
    }

    public function findVoteByPublication(int $idpub, int $idclient)
    {
        try {
            return $this->createQueryBuilder('v')
                ->where('v.idpublication = :idpub')
                ->andWhere('v.idclient = :idcl')
                ->setParameter('idpub', $idpub)
                ->setParameter('idcl', $idclient)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException|NonUniqueResultException $e) {
        }
        return null;
    }

    // /**
    //  * @return Vote[] Returns an array of Vote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vote
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

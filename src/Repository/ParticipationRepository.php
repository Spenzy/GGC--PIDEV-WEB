<?php

namespace App\Repository;

use App\Entity\Participation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Participation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participation[]    findAll()
 * @method Participation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participation::class);

    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Participation $entity, bool $flush = true): void
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
    public function remove(Participation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    
    // /**
    //  * @return Participation[] Returns an array of Participation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Participation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
        /**
     * Returns number of "Commande" per day
     * @return void
     */
    public function countById(){
        //$query = $this->createQueryBuilder('c')
            //->select('SUBSTRING(d.date, 1, 10) as date, COUNT(c) as count')
            //->groupBy('date')
        //;
        //return $query->getQuery()->getResult();
       $query = $this->getEntityManager()->createQuery("
       SELECT b.reference as id ,COUNT(a) as count , b.titre as ide FROM App\Entity\Participation a,App\Entity\Evenement b WHERE (a.idEvent = b.reference) GROUP BY ide
       ");
       return $query->getResult();
   }

   public function findParticipationByUser($idClient, $idEvent)
   {
       try {
           return $this->createQueryBuilder('p')
               ->where('p.idEvent = :idE')
               ->andWhere('p.idClient = :idcl')
               ->setParameter('idE', $idEvent)
               ->setParameter('idcl', $idClient)
               ->getQuery()
               ->getOneOrNullResult();
       } catch (NoResultException|NonUniqueResultException $e) {
       }
       return null;
   }

}

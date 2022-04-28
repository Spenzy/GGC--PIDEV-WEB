<?php

namespace App\Repository;

use App\Entity\Streamer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Streamer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Streamer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Streamer[]    findAll()
 * @method Streamer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StreamerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Streamer::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Streamer $entity, bool $flush = true): void
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
    public function remove(Streamer $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findAllStreamers(){
        return $this->getEntityManager()->createQuery('select s from App\Entity\Streamer s order by s.nom desc')->getResult();
    }

    public function rechercheNomS(string $nom){
        return $this->createQueryBuilder('s')
                ->JOIN('s.idstreamer', 'p')
                ->where('p.nom like  :nom  ')
                ->setParameter('nom','%'.$nom.'%')
                ->getQuery()
                ->getResult();
    }

    // /**
    //  * @return Streamer[] Returns an array of Streamer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Streamer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

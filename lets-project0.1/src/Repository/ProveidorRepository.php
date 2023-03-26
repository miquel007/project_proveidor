<?php

namespace App\Repository;

use App\Entity\Proveidor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Proveidor>
 *
 * @method Proveidor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proveidor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proveidor[]    findAll()
 * @method Proveidor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProveidorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proveidor::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Proveidor $entity, bool $flush = true): void
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
    public function remove(Proveidor $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}

<?php

namespace App\Repository;

use App\Entity\EstablishmentRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentRole>
 */
class EstablishmentRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentRole::class);
    }
}

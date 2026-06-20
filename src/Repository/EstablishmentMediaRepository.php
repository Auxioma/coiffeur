<?php

namespace App\Repository;

use App\Entity\EstablishmentMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentMedia>
 */
class EstablishmentMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentMedia::class);
    }
}

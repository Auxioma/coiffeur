<?php

namespace App\Repository;

use App\Entity\EstablishmentClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentClient>
 */
class EstablishmentClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentClient::class);
    }
}

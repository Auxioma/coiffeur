<?php

namespace App\Repository;

use App\Entity\EstablishmentTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstablishmentTranslation>
 */
class EstablishmentTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablishmentTranslation::class);
    }
}

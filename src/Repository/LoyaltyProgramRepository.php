<?php

namespace App\Repository;

use App\Entity\LoyaltyProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LoyaltyProgram>
 */
class LoyaltyProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoyaltyProgram::class);
    }
}

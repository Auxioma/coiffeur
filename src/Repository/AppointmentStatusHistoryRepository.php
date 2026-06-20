<?php

namespace App\Repository;

use App\Entity\AppointmentStatusHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AppointmentStatusHistory>
 */
class AppointmentStatusHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppointmentStatusHistory::class);
    }
}

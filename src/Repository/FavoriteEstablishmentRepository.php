<?php

namespace App\Repository;

use App\Entity\FavoriteEstablishment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FavoriteEstablishment>
 */
class FavoriteEstablishmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FavoriteEstablishment::class);
    }
}

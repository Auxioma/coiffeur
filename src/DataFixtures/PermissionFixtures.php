<?php

namespace App\DataFixtures;

use App\Entity\Permission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class PermissionFixtures extends Fixture
{
    public const REFERENCE_PREFIX = 'permission_';

    private const PERMISSIONS = [
        ['code' => 'dashboard.view', 'label' => 'Voir le tableau de bord', 'module' => 'dashboard'],
        ['code' => 'agenda.view_all', 'label' => 'Voir tous les plannings', 'module' => 'agenda'],
        ['code' => 'agenda.manage', 'label' => 'Créer et modifier les rendez-vous', 'module' => 'agenda'],
        ['code' => 'agenda.cancel', 'label' => 'Annuler un rendez-vous', 'module' => 'agenda'],
        ['code' => 'clients.view', 'label' => 'Voir les clients', 'module' => 'clients'],
        ['code' => 'clients.manage', 'label' => 'Créer et modifier les clients', 'module' => 'clients'],
        ['code' => 'services.manage', 'label' => 'Gérer le catalogue de prestations', 'module' => 'services'],
        ['code' => 'team.manage', 'label' => 'Gérer l’équipe', 'module' => 'team'],
        ['code' => 'resources.manage', 'label' => 'Gérer les ressources physiques', 'module' => 'resources'],
        ['code' => 'reviews.manage', 'label' => 'Gérer les avis', 'module' => 'reviews'],
        ['code' => 'marketing.manage', 'label' => 'Gérer le marketing', 'module' => 'marketing'],
        ['code' => 'reports.view', 'label' => 'Voir les statistiques', 'module' => 'reports'],
        ['code' => 'settings.manage', 'label' => 'Gérer les paramètres établissement', 'module' => 'settings'],
        ['code' => 'billing.manage', 'label' => 'Gérer l’abonnement SaaS', 'module' => 'billing'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PERMISSIONS as $data) {
            $permission = (new Permission())
                ->setCode($data['code'])
                ->setLabel($data['label'])
                ->setModule($data['module']);

            $manager->persist($permission);
            $this->addReference(self::REFERENCE_PREFIX.$data['code'], $permission);
        }

        $manager->flush();
    }
}

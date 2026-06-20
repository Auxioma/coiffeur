<?php

namespace App\DataFixtures;

use App\Entity\Subscription;
use App\Entity\SubscriptionInvoice;
use App\Entity\SubscriptionPayment;
use App\Entity\WebhookEvent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class BillingDemoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        /** @var list<Subscription> $subscriptions */
        $subscriptions = $manager->getRepository(Subscription::class)->findAll();

        foreach ($subscriptions as $index => $subscription) {
            $number = $index + 1;
            $totalCents = $number === 2 ? 14900 : 7900;
            $taxCents = (int) round($totalCents * 0.20);
            $subtotalCents = $totalCents - $taxCents;

            $invoice = (new SubscriptionInvoice())
                ->setSubscription($subscription)
                ->setInvoiceNumber(sprintf('INV-2026-%04d', $number))
                ->setStripeInvoiceId('in_demo_'.str_pad((string) $number, 6, '0', STR_PAD_LEFT))
                ->setCurrency('EUR')
                ->setSubtotalCents($subtotalCents)
                ->setTaxCents($taxCents)
                ->setTotalCents($totalCents)
                ->setStatus('paid')
                ->setHostedInvoiceUrl('https://billing.example.test/invoices/'.sprintf('INV-2026-%04d', $number))
                ->setPdfUrl('https://billing.example.test/invoices/'.sprintf('INV-2026-%04d', $number).'.pdf')
                ->setIssuedAt(new \DateTimeImmutable('-'.(30 - $number).' days'))
                ->setPaidAt(new \DateTimeImmutable('-'.(29 - $number).' days'));

            $payment = (new SubscriptionPayment())
                ->setInvoice($invoice)
                ->setStripePaymentIntentId('pi_demo_'.str_pad((string) $number, 6, '0', STR_PAD_LEFT))
                ->setAmountCents($totalCents)
                ->setCurrency('EUR')
                ->setStatus('succeeded')
                ->setFailureReason(null)
                ->setPaidAt(new \DateTimeImmutable('-'.(29 - $number).' days'));

            $webhook = (new WebhookEvent())
                ->setProvider('stripe')
                ->setEventId('evt_demo_invoice_paid_'.$number)
                ->setEventType('invoice.paid')
                ->setPayload([
                    'subscription_id' => $subscription->getId(),
                    'invoice_number' => sprintf('INV-2026-%04d', $number),
                    'status' => 'paid',
                ])
                ->setProcessedAt(new \DateTimeImmutable('-'.(29 - $number).' days'))
                ->setProcessingError(null);

            $manager->persist($invoice);
            $manager->persist($payment);
            $manager->persist($webhook);
        }

        $failedWebhook = (new WebhookEvent())
            ->setProvider('stripe')
            ->setEventId('evt_demo_payment_failed')
            ->setEventType('invoice.payment_failed')
            ->setPayload(['status' => 'failed', 'reason' => 'card_declined'])
            ->setProcessedAt(null)
            ->setProcessingError('Demo event not processed yet');

        $manager->persist($failedWebhook);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProfessionalDemoFixtures::class,
            SubscriptionPlanFixtures::class,
        ];
    }
}

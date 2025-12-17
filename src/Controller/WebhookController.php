<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class WebhookController extends AbstractController
{
    /**
     * ProfitShare Webhook endpoint for order notifications
     * Called by ProfitShare when orders are created or updated
     *
     * Documentation: https://profitshare.bg/docs/webhooks
     * User-Agent: ProfitshareWebhooks/v1.0
     */
    #[Route('/webhook/profitshare', name: 'app_webhook_profitshare', methods: ['GET'])]
    public function profitshareWebhook(Request $request, LoggerInterface $logger): Response
    {
        // Get all webhook parameters sent by ProfitShare
        $orderReference = $request->query->get('order_reference');
        $advertiserId = $request->query->get('advertiser_id');
        $status = $request->query->get('status'); // pending, approved, canceled
        $orderDateTime = $request->query->get('order_date_time');
        $commissions = $request->query->get('commissions');
        $amount = $request->query->get('amount');
        $referrerPage = $request->query->get('referrer_page');
        $type = $request->query->get('type'); // order_add or order_update
        $hash = $request->query->get('hash');

        // Verify User-Agent (optional security check)
        $userAgent = $request->headers->get('User-Agent');

        // Log all webhook data
        $logger->info('ProfitShare Webhook Received', [
            'type' => $type,
            'order_reference' => $orderReference,
            'advertiser_id' => $advertiserId,
            'status' => $status,
            'amount' => $amount,
            'commissions' => $commissions,
            'order_date_time' => $orderDateTime,
            'referrer_page' => $referrerPage,
            'hash' => $hash,
            'user_agent' => $userAgent
        ]);

        // Process the webhook based on type
        if ($type === 'order_add') {
            // FIX: Добавихме ?? '', за да не гърми при тест, когато няма ID
            $this->handleOrderAdd($orderReference, $advertiserId ?? '', $amount, $commissions, $logger);
        } elseif ($type === 'order_update') {
            $this->handleOrderUpdate($orderReference, $status, $amount, $commissions, $logger);
        }

        // Always return 200 OK to ProfitShare
        return new Response('OK', 200);
    }

    /**
     * Handle new order webhook
     */
    private function handleOrderAdd(
        string $orderReference,
        string $advertiserId,
        ?string $amount,
        ?string $commissions,
        LoggerInterface $logger
    ): void {
        $logger->info('🎉 NEW ORDER RECEIVED!', [
            'order_reference' => $orderReference,
            'advertiser_id' => $advertiserId,
            'amount' => $amount,
            'commission' => $commissions
        ]);

        // TODO: Implement your business logic here:
        // 1. Save order to database
        // 2. Send email notification
        // 3. Update statistics
        // 4. Trigger other actions
    }

    /**
     * Handle order update webhook
     */
    private function handleOrderUpdate(
        string $orderReference,
        ?string $status,
        ?string $amount,
        ?string $commissions,
        LoggerInterface $logger
    ): void {
        $logger->info('📝 ORDER UPDATED', [
            'order_reference' => $orderReference,
            'new_status' => $status,
            'amount' => $amount,
            'commission' => $commissions
        ]);

        // TODO: Implement your business logic here:
        // 1. Update order status in database
        // 2. Send notification if status changed to 'approved' or 'canceled'
        // 3. Update commission totals
    }
}

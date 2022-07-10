<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\External\PaymentNotificationService;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaymentReceived;
use App\Models\User;

class NotifyPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private User $receiver
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PaymentNotificationService $paymentNotificationService)
    {
        $isAvailable = $paymentNotificationService->isAvailable();

        if ($isAvailable) {
            Notification::send($this->receiver, new PaymentReceived());
        }
    }
}

<?php

namespace App\Observers;

use App\Models\Transaction;
use Ramsey\Uuid\Uuid;
use App\Jobs\NotifyPaymentJob;

class TransactionObserver
{
    /**
     * Handle the Transaction "creating" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function creating(Transaction $transaction)
    {
        $transaction->id = Uuid::uuid4();
    }

    /**
     * Handle the Transaction "created" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {
        $receiver = $transaction->receiver->user;

        NotifyPaymentJob::dispatch($receiver);
    }
}

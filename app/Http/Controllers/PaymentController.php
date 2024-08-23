<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PaymentController extends Controller
{

    /*
  public function simulatePayment(Request $request)
{
    $validatedData = $request->validate([
        'from_account' => 'required|numeric',
        'to_account' => 'required|numeric',
        'amount' => 'required|numeric|min:0.01',
        'payment_service' => 'required|string',
        'secret_code' => 'required|string'
    ]);

    $fromAccountNumber = $validatedData['from_account'];
    $toAccountNumber = $validatedData['to_account'];
    $amount = $validatedData['amount'];
    $paymentService = $validatedData['payment_service'];
    $secretCode = $validatedData['secret_code'];

    DB::beginTransaction();

    try {
        // Vérifier les comptes
        $fromAccount = Account::where('account_number', $fromAccountNumber)->first();
        $toAccount = Account::where('account_number', $toAccountNumber)->first();

        if (!$fromAccount || !$toAccount) {
            return response()->json(['error' => 'Informations de compte incorrectes.'], 400);
        }

        if ($fromAccount->secret_code !== $secretCode) {
            return response()->json(['error' => 'Numero de compte ou code secret incorrect.'], 400);
        }

        if ($fromAccount->balance < $amount) {
            return response()->json(['error' => 'Solde insuffisant.'], 400);
        }

        // Simuler le paiement
        $transaction = Transaction::create([
            'from_account' => $fromAccountNumber,
            'to_account' => $toAccountNumber,
            'amount' => $amount,
            'transaction_date' => now(),
            'status' => 'completed',
            'payment_service' => $paymentService,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Mettre à jour les soldes
        $fromAccount->balance -= $amount;
        $toAccount->balance += $amount;
        $fromAccount->save();
        $toAccount->save();

        DB::commit();

        return response()->json([
            'message' => 'Paiement réussi.',
            'transaction_id' => $transaction->id
        ], 200);

    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error simulating payment: ' . $e->getMessage());
        return response()->json(['error' => 'Erreur de paiement.'], 500);
    }
}
    */

    public function simulatePayment(Request $request)
    {
        $validatedData = $request->validate([
            'from_account' => 'required|numeric',
            'to_account' => 'required|numeric',
            'amount' => 'required|numeric|min:0.01',
            'payment_service' => 'required|string',
            'secret_code' => 'required|string'
        ]);

        $fromAccountNumber = $validatedData['from_account'];
        $toAccountNumber = $validatedData['to_account'];
        $amount = $validatedData['amount'];
        $paymentService = $validatedData['payment_service'];
        $secretCode = $validatedData['secret_code'];

        DB::beginTransaction();

        try {
            // Vérifier les comptes
            $fromAccount = Account::where('account_number', $fromAccountNumber)->first();
            $toAccount = Account::where('account_number', $toAccountNumber)->first();

            if (!$fromAccount || !$toAccount) {
                return response()->json(['error' => 'Informations de compte incorrectes.'], 400);
            }

            // Vérifier le code secret haché
            if (!Hash::check($secretCode, $fromAccount->secret_code)) {
                return response()->json(['error' => 'Numero de compte ou code secret incorrect.'], 400);
            }

            if ($fromAccount->balance < $amount) {
                return response()->json(['error' => 'Solde insuffisant.'], 400);
            }

            // Simuler le paiement
            $transaction = Transaction::create([
                'from_account' => $fromAccountNumber,
                'to_account' => $toAccountNumber,
                'amount' => $amount,
                'transaction_date' => now(),
                'status' => 'completed',
                'payment_service' => $paymentService,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Mettre à jour les soldes
            $fromAccount->balance -= $amount;
            $toAccount->balance += $amount;
            $fromAccount->save();
            $toAccount->save();

            DB::commit();

            return response()->json([
                'message' => 'Paiement réussi.',
                'transaction_id' => $transaction->id
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error simulating payment: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur de paiement.'], 500);
        }
    }



}

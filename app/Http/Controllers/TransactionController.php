<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,done,cancelled',
        ]);

        $transaction->update([
            'status' => $request->only('status')['status']
        ]);

        return back()->with('success', 'Transaction status updated successfully.');
    }
}

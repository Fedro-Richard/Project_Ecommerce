<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // For now shipping is free
        $shipping = 0;
        $total = $subtotal + $shipping;

        return view('checkout', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    public function process(Request $request)
    {
        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|in:COD,QRIS',
            'payment_proof' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        // Additional validation for QRIS
        if ($request->payment_method === 'QRIS' && !$request->hasFile('payment_proof')) {
             return back()->with('error', 'Please upload payment proof for QRIS payment.')->withInput();
        }

        try {
            DB::beginTransaction();

            $user = Auth::user();
            $proofFilename = null;

            // Handle File Upload
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $proofFilename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/proof'), $proofFilename);
            }

            $status = ($request->payment_method == 'COD') ? 'pending' : 'paid_waiting_verification';

            // Insert each item as a transaction record (consistent with existing logic in ChatbotController)
            foreach ($cart as $id => $details) {
                DB::table('transactions')->insert([
                    'user_id' => $user ? $user->id : null,
                    'item_name' => $details['name'],
                    'qty' => $details['quantity'],
                    'total_price' => $details['price'] * $details['quantity'],
                    'customer_name' => $request->name,
                    'customer_address' => $request->address,
                    'customer_phone' => $request->phone,
                    'payment_method' => $request->payment_method,
                    'payment_proof' => $proofFilename,
                    'status' => $status,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();

            // Clear Cart
            session()->forget('cart');

            return redirect()->route('shop.index')->with('success', 'Thank you! Your order is being processed by our admin.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong processing your order. Please try again.')->withInput();
        }
    }
}

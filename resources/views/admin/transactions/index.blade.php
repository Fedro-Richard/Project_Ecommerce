@extends('layouts.admin')

@section('title', 'Transactions - Admin Florenoria')

@section('content')
<div class="mb-6">
    <h1 class="text-xl font-bold text-[#f5f5dc]">Transactions</h1>
</div>

{{-- Message Feedback --}}
@if(session('success'))
    <div class="mb-4 p-3 bg-green-900/50 text-green-100 rounded-md flex items-center gap-2 text-sm border border-green-700">
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="bg-transparent rounded-lg shadow-sm overflow-hidden border border-[#f5f5dc]/20">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse border border-white">
            <thead>
                <tr class="text-[#fbab43]">
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">ID Trx</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Customer Name</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Phone</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Address</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Waktu</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Item</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Total</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Type</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Proof</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Status</th>
                    <th class="py-3 px-4 text-[11px] font-bold uppercase tracking-wider border border-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                <tr class="hover:bg-[#f5f5dc]/10 transition-colors text-xs text-[#f5f5dc]">
                    {{-- ID Trx --}}
                    <td class="py-3 px-4 border border-white font-medium">
                        #{{ $transaction->id }}
                    </td>

                    {{-- Customer Name --}}
                    <td class="py-3 px-4 border border-white font-bold text-white">
                        {{ $transaction->customer_name }}
                    </td>

                    {{-- Phone --}}
                    <td class="py-3 px-4 border border-white">
                        {{ $transaction->customer_phone }}
                    </td>

                    {{-- Address --}}
                    <td class="py-3 px-4 border border-white max-w-[200px] truncate" title="{{ $transaction->customer_address }}">
                        {{ $transaction->customer_address }}
                    </td>

                    {{-- Waktu --}}
                    <td class="py-3 px-4 border border-white whitespace-nowrap">
                        {{ $transaction->created_at->format('Y-m-d H:i') }}
                    </td>

                    {{-- Item --}}
                    <td class="py-3 px-4 border border-white">
                        {{ $transaction->item_name }} <span class="text-[#fbab43]">x{{ $transaction->qty }}</span>
                    </td>

                    {{-- Total --}}
                    <td class="py-3 px-4 border border-white font-medium">
                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                    </td>

                    {{-- Type (Yellow badge style) --}}
                    <td class="py-3 px-4 border border-white text-center">
                        <span class="inline-block px-2 py-0.5 bg-[#fbab43] text-[#592203] text-[10px] font-bold rounded uppercase tracking-wider">
                            {{ $transaction->payment_method ?: 'N/A' }}
                        </span>
                    </td>

                    {{-- Proof --}}
                    <td class="py-3 px-4 border border-white text-center">
                         @if($transaction->item_image)
                            <a href="{{ asset($transaction->item_image) }}" target="_blank" class="text-blue-400 hover:text-blue-300 font-bold underline">
                                View
                            </a>
                        @elseif($transaction->payment_proof)
                            <a href="{{ asset('uploads/proof/' . $transaction->payment_proof) }}" target="_blank" class="text-blue-400 hover:text-blue-300 font-bold underline">
                                Proof
                            </a>
                        @else
                            <span class="text-gray-500">-</span>
                        @endif
                    </td>

                    {{-- Status (Green Badge style) --}}
                    <td class="py-3 px-4 border border-white text-center">
                        @php
                            $statusClass = match($transaction->status) {
                                'paid', 'done' => 'bg-green-600',
                                'pending' => 'bg-gray-600',
                                'shipped' => 'bg-blue-600',
                                'cancelled' => 'bg-red-600',
                                default => 'bg-gray-600',
                            };
                            $statusLabel = strtoupper($transaction->status);
                            if($transaction->status == 'done') $statusLabel = 'SUCCESS'; 
                        @endphp
                        <span class="inline-block px-2 py-0.5 {{ $statusClass }} text-white text-[10px] font-bold rounded uppercase tracking-wider">
                            {{ $statusLabel }}
                        </span>
                    </td>

                    {{-- Action --}}
                    <td class="py-3 px-4 border border-white text-center">
                        <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" 
                                    class="text-xs border-none bg-white text-black font-medium cursor-pointer focus:ring-0 p-1 rounded text-center">
                                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $transaction->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="shipped" {{ $transaction->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="done" {{ $transaction->status == 'done' ? 'selected' : '' }}>Done</option>
                                <option value="cancelled" {{ $transaction->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="py-8 text-center text-[#f5f5dc] text-sm border border-[#f5f5dc]/50">
                        No transactions found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-[#f5f5dc]/20">
        {{ $transactions->links() }}
    </div>
</div>
@endsection

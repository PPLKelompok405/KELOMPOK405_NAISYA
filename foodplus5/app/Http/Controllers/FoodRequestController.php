<?php

namespace App\Http\Controllers;

use App\Models\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodRequestController extends Controller
{
    /**
     * Menampilkan dashboard penerima dengan daftar permintaan
     */
    public function dashboard()
    {
        $requests = FoodRequest::where('user_id', Auth::id())
            ->with('food')
            ->orderBy('created_at', 'desc')
            ->get();
            
        $availableFoods = Food::where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('receive.dashboard', compact('requests', 'availableFoods'));
    }

    /**
     * Menampilkan form untuk membuat permintaan baru
     */
    public function create()
    {
        $availableFoods = Food::where('status', 'available')->get();
        return view('receive.create', compact('availableFoods'));
    }

    /**
     * Menyimpan permintaan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'notes' => 'nullable|string|max:255',
        ]);

        $foodRequest = FoodRequest::create([
            'user_id' => Auth::id(),
            'food_id' => $request->food_id,
            'notes' => $request->notes,
            'status' => 'pending'
        ]);

        return redirect()->route('receive.dashboard')
            ->with('success', 'Permintaan makanan berhasil dibuat!');
    }

    /**
     * Menampilkan detail permintaan
     */
    public function show($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('food')
            ->firstOrFail();
            
        return view('receive.show', compact('foodRequest'));
    }

    /**
     * Menampilkan form untuk mengedit permintaan
     */
    public function edit($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
            
        return view('receive.edit', compact('foodRequest'));
    }

    /**
     * Mengupdate permintaan
     */
    public function update(Request $request, $id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'notes' => 'nullable|string|max:255',
        ]);

        $foodRequest->update([
            'notes' => $request->notes,
        ]);

        return redirect()->route('receive.dashboard')
            ->with('success', 'Permintaan berhasil diperbarui!');
    }

    /**
     * Menandai permintaan sebagai diterima
     */
    public function markAsReceived($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $foodRequest->update([
            'status' => 'received',
            'received_at' => now()
        ]);

        // Update status makanan menjadi 'taken'
        $foodRequest->food->update(['status' => 'taken']);

        return redirect()->route('receive.dashboard')
            ->with('success', 'Makanan telah ditandai sebagai diterima!');
    }

    /**
     * Menghapus permintaan
     */
    public function destroy($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $foodRequest->delete();

        return redirect()->route('receive.dashboard')
            ->with('success', 'Permintaan berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|integer|exists:books,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $book = Book::find($request->book_id);

        $transaction = Transaction::create([
            'user_id' => auth('api')->id(), 
            'book_id' => $book->id,
            'order_number' => 'INV/' . now()->format('Ymd') . '/' . Str::upper(Str::random(6)),
            'total_amount' => $book->price, 
            'status' => 'pending',
        ]);

        $transaction->load('user', 'book');

        return response()->json($transaction, 201);
    }

    public function show($id)
    {
        $transaction = Transaction::with('user', 'book')->find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        if ($transaction->user_id !== auth('api')->id()) {
            return response()->json(['message' => 'Forbidden: You do not own this transaction'], 403);
        }

        return response()->json($transaction);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        if ($transaction->user_id !== auth('api')->id()) {
            return response()->json(['message' => 'Forbidden: You do not own this transaction'], 403);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:pending,cancelled',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $transaction->update(['status' => $request->status]);

        return response()->json($transaction);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
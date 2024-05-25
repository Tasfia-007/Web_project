<?php

namespace App\Http\Controllers;

use App\Models\Cancellation;
use Illuminate\Http\Request;

class CancellationController extends Controller
{
 public function index()
{
    $cancellations = Cancellation::all();
    return view('cancellations.index', compact('cancellations'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'reservation_number' => 'required',
            'reason' => 'required',
        ]);

        Cancellation::create($data);

        return redirect()->back()->with('message', 'Cancellation request submitted successfully.');
    }
    public function create()
{
    return view('cancellations.create');
}
}

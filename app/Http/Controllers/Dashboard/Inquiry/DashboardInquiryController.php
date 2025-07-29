<?php

namespace App\Http\Controllers\Dashboard\Inquiry;

use App\Models\Inquiry;
use App\Http\Controllers\Controller;

class DashboardInquiryController extends Controller
{
   /**
     * Display a listing of the inquiries.
     */
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(10);
        return view('inquiries.index', compact('inquiries'));
    }

    /**
     * Display the specified inquiry.
     */
    public function show(Inquiry $inquiry)
    {
        return view('inquiries.show', compact('inquiry'));
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}

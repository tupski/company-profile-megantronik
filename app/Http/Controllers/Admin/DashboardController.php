<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     */
    public function index()
    {
        $totalServices = Service::count();
        $totalProducts = Product::count();
        $totalTestimonials = Testimonial::count();
        $totalContacts = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        $latestContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalProducts',
            'totalTestimonials',
            'totalContacts',
            'unreadContacts',
            'latestContacts'
        ));
    }
}

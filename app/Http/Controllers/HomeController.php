<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $products = Product::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(8)
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $about = About::where('is_active', true)->first();

        return view('frontend.home', compact('services', 'products', 'testimonials', 'about'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $about = About::where('is_active', true)->first();

        return view('frontend.about', compact('about'));
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('frontend.services', compact('services'));
    }

    /**
     * Display the products page.
     */
    public function products()
    {
        $products = Product::where('is_active', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.products', compact('products'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Store a contact message.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}

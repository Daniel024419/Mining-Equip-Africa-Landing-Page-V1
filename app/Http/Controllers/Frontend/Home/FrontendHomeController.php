<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.home.index');
    }

    /**
     * about
     *
     * @return void
     */
    public function about()
    {
        return view('frontend.home.about');
    }

    /**
     * contacts
     *
     * @return void
     */
    public function contacts()
    {
        return view('frontend.home.contact');
    }

    /**
     * services
     *
     * @param  string|null $category
     * @return \Illuminate\View\View
     */
    public function services(?string $category = null)
    {
        $query = Service::latest();

        if ($category) {
            $query->where('category', $category);
        }

        $services = $query->paginate(6);

        return view('frontend.home.services', compact('services'));
    }

    /**
     * showService
     *
     * @param  mixed $service
     * @return void
     */
    public function showService(Service $service)
    {
        $relatedServices = [];

        return view('frontend.home.services-show', compact('service', 'relatedServices'));
    }

    /**
     * projects
     *
     * @return void
     */
    public function projects()
    {
        $projects = Project::latest()->paginate(10);
        return view('frontend.home.projects', [
            'projects' => $projects
        ]);
    }


    /**
     * blog
     *
     * @return void
     */
    public function blog()
    {
        return view('frontend.home.blog');
    }

    /**
     * teams
     *
     * @return void
     */
    public function teams()
    {
        return view('frontend.home.team');
    }

    /**
     * testimonial
     *
     * @return void
     */
    /**
     * testimonial
     *
     * @return void
     */
    public function testimonial()
    {
        return view('frontend.home.testimonial');
    }

    /**
     * features
     *
     * @return void
     */
    public function features()
    {
        return view('frontend.home.features');
    }

    /**
     * gallery
     *
     * @return void
     */
    public function gallery()
    {
        $equipment = Equipment::latest()->paginate(9);

        return view('frontend.home.gallery', compact('equipment'));
    }

    /**
     * Display a list of equipment, optionally filtered by condition.
     *
     * @param string|null $condition
     * @return \Illuminate\View\View
     */
    public function equipments(string | null $condition)
    {
        $query = Equipment::query()->latest();

        // Apply condition filter only if it's provided and not 'all'
        if ($condition && strtolower($condition) !== 'all') {
            $query->where('condition', $condition);
        }

        $equipments = $query->paginate(10);

        return view('frontend.home.equipments', compact('equipments'));
    }

    /**
     * showEquiment
     *
     * @param  Equipment $equipment
     * @return void
     */
    public function showEquiment(Equipment $equipment)
    {
        return view('frontend.home.equipment-details', compact('equipment'));
    }

    /**
     * Store a newly created inquiry in storage.
     */
    public function storeInquiries(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        return redirect()->back()->with('success', 'Inquiry submitted successfully.');
    }
}

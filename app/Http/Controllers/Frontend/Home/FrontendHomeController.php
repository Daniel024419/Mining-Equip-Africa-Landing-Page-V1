<?php

namespace App\Http\Controllers\Frontend\Home;

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
     * @return void
     */
    public function services()
    {
        $services = Service::latest()->paginate(6);
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
        return view('services.show', compact('service'));
    }

    /**
     * projects
     *
     * @return void
     */
    public function projects()
    {
        return view('frontend.home.projects');
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
     * equipment
     *
     * @return void
     */
    public function equipments()
    {
        $equipment = Equipment::latest()->paginate(9);

        return view('frontend.home.equipments', compact('equipment'));
    }

    /**
     * showEquiment
     *
     * @param  Equipment $equipment
     * @return void
     */
    public function showEquiment(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }
}

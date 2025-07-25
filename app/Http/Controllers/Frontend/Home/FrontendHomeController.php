<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.home.services');
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
        return view('frontend.home.gallery');
    }
    
    /**
     * equipment
     *
     * @return void
     */
    public function equipments()
    {
        return view('frontend.home.equipments');
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function toAbout()
    {
        return view('client.pages.about.about');
    }

    public function toBlog()
    {
        return view('client.pages.blog.blog');
    }

    public function toTeam()
    {
        return view('client.pages.team.team');
    }

    public function toTestimonials()
    {
        return view('client.pages.testimonials.testimonials');
    }

    public function toFaq()
    {
        return view('client.pages.faq.faq');
    }

    public function toTerms()
    {
        return view('client.pages.terms.terms');
    }

    public function toBlogDetail()
    {
        return view('client.pages.blog_detail.blog_detail');
    }
}

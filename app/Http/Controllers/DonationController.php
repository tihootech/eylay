<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('more_donates');
        $this->middleware('master')->except('more_donates');
    }

    public function more_donates($step)
    {
        $skip = $step * 6;
        $donations = Donation::latest()->skip($skip)->limit(6)->get();
        if ($donations->count()) {
            return view('landing.partials.donations', compact('donations'));
        }else {
            return '';
        }
    }

    public function index()
    {
        $donations = Donation::latest()->get();
        return view('dashboard.donation.index', compact('donations'));
    }

    public function create()
    {
        $donation = new Donation;
        return view('dashboard.donation.form', compact('donation'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Donation::create($data);
        return redirect()->route('donation.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function edit(Donation $donation)
    {
        return view('dashboard.donation.form', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $data = self::validation($donation);
        $donation->update($data);
        return redirect()->route('donation.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donation.index')->withMessage(__('CHANGES_MADE_SUCCESSFULLY'));
    }

    public static function validation()
    {
        $data = request()->validate([
            'name' => 'required',
            'amount' => 'required',
            'mobile' => 'nullable',
            'info' => 'nullable',
            'reply' => 'nullable',
        ]);
        return $data;
    }
}

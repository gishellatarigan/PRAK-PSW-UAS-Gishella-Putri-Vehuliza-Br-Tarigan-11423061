<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.member.index', compact('members')); // Ensure this path matches your view structure
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create'); // Ensure this path matches your view structure
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        Member::create($request->all());

        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan.');
    }
}

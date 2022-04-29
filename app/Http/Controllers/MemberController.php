<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->save();
        return $member;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member = Member::find($request->id);
        $member->update([
            'name' => $request->name
        ]);
        return $member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member = Member::find($member)->first();
        $member->delete();
        return $member;
    }

    public function search($t) {
        $members = Member::where('name', 'LIKE', '%'.$t.'%')->get();
        return $members;
    }
}

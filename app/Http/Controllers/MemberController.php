<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::orderBy('member_id','desc')->leftJoin('genders', 'members.gender', '=', 'genders.gender_id')->paginate(10);

        return view('backend.member.index',[
            'member' => $member
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        // return $request->all();

        $member = new Member();
        $member->code = $request->code;
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->total = $request->total;

        $member->save();

        return redirect()->route('member.index')->with('feedback', 'บันทึกข้อมูลเรียบร้อยแล้ว');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('backend.member.edit',[
            'member' => $member
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        $member->code = $request->code;
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->total = $request->total;

        $member->save();

        return redirect()->route('member.index')->with('feedback', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('feedback','ลบข้อมูลเรียบร้อยแล้ว');
    }
}

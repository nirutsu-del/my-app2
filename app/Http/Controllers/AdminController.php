<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function blogs()
    {
        $blogs = [
            [
                'title' => 'บทความที่ 1',
                'content' => 'เนื้อหาบทความที่ 1',
                'status' => true,
            ],
            [
                'title' => 'บทความที่ 2',
                'content' => 'เนื้อหาบทความที่ 2',
                'status' => true,
            ],
            [
                'title' => 'บทความที่ 3',
                'content' => 'เนื้อหาบทความที่ 3',
                'status' => false,
            ],
            [
                'title' => 'บทความที่ 4',
                'content' => 'เนื้อหาบทความที่ 4',
                'status' => false,
            ],
            [
                'title' => 'บทความที่ 5',
                'content' => 'เนื้อหาบทความที่ 5',
                'status' => true,
            ],
        ];

        return view('blogs', compact('blogs'));
    }

    function abouts()
    {
        $name = "Nirut Suetrong";
        $date = "6 กรกฏาคม 2026";
        return view('abouts' , compact('name' , 'date'));
    }

    function create()
    {
        return view('form');
    }
    function insert(Request $request)
    {
        $request->validate([
            'title' => 'required | max:50',
            'content' => 'required',
        ],[
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
        ]);
    }

    function showClaimForm()
    {
        return view('claim');
    }

    function submitClaimForm(Request $request)
    {
        $validated = $request->validate([
            'serial_number' => 'required|min:5|max:20',
            'email' => 'required|email',
            'defect_description' => 'required|min:10',
            'urgency' => 'required|in:low,medium,high',
        ], [
            'serial_number.required' => 'กรุณากรอกรหัสสินค้า (Serial Number)',
            'serial_number.min' => 'รหัสสินค้าต้องมีความยาวอย่างน้อย 5 ตัวอักษร',
            'serial_number.max' => 'รหัสสินค้าต้องมีความยาวไม่เกิน 20 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมลผู้ติดต่อ',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'defect_description.required' => 'กรุณากรอกรายละเอียดอาการชำรุด',
            'defect_description.min' => 'กรุณากรอกรายละเอียดอาการชำรุดอย่างน้อย 10 ตัวอักษร',
            'urgency.required' => 'กรุณาเลือกระดับความเร่งด่วน',
            'urgency.in' => 'ระดับความเร่งด่วนไม่ถูกต้อง',
        ]);

        return redirect()->back()
            ->with('success', 'ส่งข้อมูลแจ้งเคลมสินค้าชำรุดสำเร็จ!')
            ->with('claim_data', $validated);
    }
}

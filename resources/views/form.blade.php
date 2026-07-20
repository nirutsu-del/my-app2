@extends('layout')

@section('title', 'เขียนบทความ')

@section('content')
    <h2 class="text text-center py-3">เขียนบทความ</h2>
    <form method="POST" action="/insert">
        @csrf  <!-- // ป้องกันการโจมตี -->
        <div class="form-group">
            <label for ="title">ชื่อบทความ</label>
            <input type="text" class="form-control" name="title">
        </div>
        @error('title')
            <p class="text-danger">{{ $message}}</p>
        @enderror
        <div class="form-group">
            <label for ="title">เนื้อหา</label>
            <textarea name="content" cols="30" row="5" class="form-control"></textarea>
        </div>
        @error('content')
            <p class="text-danger">{{ $message}}</p>
        @enderror
        <input type="submit" value="บันทึก" class="btn btn-primary mt-3">
        <a href="/blogs" class="btn btn-secondary mt-3">บทความทั้งหมด</a>
    </form>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เพิ่มรายการงาน</div>

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("joblist.store") }}' enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="ชื่อเรื่อง">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" type="text" name="description"></textarea>
                            @error('description')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="status" id="status">
                                <option value="success">เสร็จสิ้น</option>
                                <option value="pending">รอดำเนินการ</option>
                            </select>
                            @error('status')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("joblist.index") }}' type="submit">ยกเลิก</a>
                            <button class="btn btn-success" type="submit">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
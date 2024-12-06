@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายการงาน</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("joblist.create") }}'><i class="fa fa-plus"></i> เพิ่ม</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    ชื่อเรื่อง
                                </th>
                                <th>
                                    รายละเอียดงาน
                                </th>
                                <th>
                                    สถานะ
                                </th>
                                <th width="5%">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($joblists as $joblist)
                            <tr>
                                <td>
                                    {{ $joblist->title ?? 'N/A' }}
                                </td>
                                <td>
                                    {{ $joblist->description ?? 'N/A' }}
                                </td>
                                <td>
                                    <!-- {{ $joblist->status ?? 'N/A' }} -->
                                    @if($joblist->status == 'success')
                                    <div class="alert alert-success" role="alert">
                                        เสร็จสิ้น
                                    </div>
                                    @elseif($joblist->status == 'pending')
                                    <div class="alert alert-warning" role="alert">
                                        รอดำเนินการ
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    {{ optional($joblist->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a class="btn btn-success d-block mb-2" href='{{ route("joblist.edit", $joblist->id) }}'><i class="fa fa-pencil"></i> แก้ไข</a>

                                    <form method="POST" action="{{ route('joblist.destroy', $joblist->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <input type="submit" class="btn btn-danger d-block" value="ลบ">
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
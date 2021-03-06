@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        ตั้งค่าประเภทสินค้า
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('category.create') }}" role="button">
                <i class="mdi mdi-library-plus"></i>
                เพิ่มรายการ
            </a>
        </ol>
    </nav>
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">ประเภทสินค้าทั้งหมด {{ $category->total() }} รายการ</h4>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสประเภทสินค้า</th>
                              <th>ประเภทสินค้า</th>
                              <th>เครื่องมือ</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($category as $item )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->catrgory_id }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('category.edit',['catrgory_id'=>$item->catrgory_id]) }}" class="btn btn-gradient-success btn-sm">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                    </a>
                                                    <form method="POST" class="d-inline"
                                                            action="{{ route('category.destroy',['catrgory_id'=>$item->catrgory_id]) }}"
                                                            onsubmit="return confirm('แน่ใจว่าต้องการลบข้อมูล?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-gradient-danger btn-sm">
                                                                <i class="mdi mdi-delete-forever"></i>
                                                        </button>
                                                    </form>
                                                  </div>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
    </div>
</div>

@endsection
@section('footerscript')
    @if (session('feedback'))
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script>
            swal("{{ session('feedback') }}","","success");
        </script>
    @endif
@endsection

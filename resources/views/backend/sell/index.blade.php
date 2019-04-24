@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        ข้อมูลการขายสินค้า
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('sell.create') }}" role="button">
                <i class="mdi mdi-library-plus"></i>
                บันทึกการขายสินค้า
            </a>
        </ol>
    </nav>
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                      <h4 class="card-title">รายการสินค้าทั้งหมด {{ $sell->total() }} รายการ</h4>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสสินค้า</th>
                              <th>โค้ดสินค้า</th>
                              <th>ชื่อสินค้า</th>
                              <th>จำนวนสินค้า</th>
                              <th>ราคาสินค้า</th>
                              <th>วัน/เวลา</th>
                              <th>เครื่องมือ</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($sell as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->sell_code }}</td>
                                    <td class="text-left">{{ $item->sell_name }}</td>
                                    <td>{{ $item->sell_stock }}</td>
                                    <td>{{ number_format($item->sell_price,2) }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('sell.edit',['product_id'=>$item->sell_id]) }}" class="btn btn-gradient-success btn-sm">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                    </a>
                                                    <form method="POST" class="d-inline"
                                                            action="{{ route('sell.destroy',['product_id'=>$item->sell_id]) }}"
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
                        <br>
                            {{ $sell->links() }}
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

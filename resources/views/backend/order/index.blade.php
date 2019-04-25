@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        ข้อมูลสั่งซื้อสินค้า
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('order.create') }}" role="button">
                <i class="mdi mdi-library-plus"></i>
                สั่งซื้อสินค้า
            </a>
        </ol>
    </nav>
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                      <h4 class="card-title">รายการสั่งซื้อทั้งหมด {{ $order->total() }} รายการ</h4>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสสั่งซื้อ</th>
                              <th>ชื่อสินค้า</th>
                              <th>จำนวนสินค้า</th>
                              <th>ราคาสินค้า (ต่อชิ้น)</th>
                              <th>รวมราคา</th>
                              <th>ผู้ดำเนินการ</th>
                              <th>เครื่องมือ</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->price,2) }}</td>
                                    <td>{{ number_format($item->total,2) }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('order.edit',['order_id'=>$item->order_id]) }}" class="btn btn-gradient-success btn-sm">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                    </a>
                                                    <form method="POST" class="d-inline"
                                                            action="{{ route('order.destroy',['order_id'=>$item->order_id]) }}"
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
                            {{ $order->links() }}
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

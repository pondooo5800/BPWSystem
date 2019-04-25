@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        รายงานข้อมูลรายรับ - รายจ่าย
    </h3>
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('product.create') }}" role="button">
                <i class="mdi mdi-library-plus"></i>
                เพิ่มรายการ
            </a>
        </ol>
    </nav> --}}
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รายการสินค้า</th>
                              <th>รายรับทั้งหมด</th>
                              <th>รายจ่ายทั้งหมด</th>
                              <th>รวมผลต่าง</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php
                                        foreach ($sell_price as $item_sell) {
                                            $total_sell_price = $item_sell->sell_price;
                                        }
                                        foreach ($order_total as $item_order) {
                                            $total_order_total = $item_order->total;
                                        }
                                ?>
                            @foreach ($product_stock as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($total_sell_price,2) }}</td>
                                    <td>{{ number_format($total_order_total,2) }}</td>
                                    <td>{{ number_format($total_sell_price - $total_order_total,2) }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <br>
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

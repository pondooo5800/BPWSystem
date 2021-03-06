@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        ข้อมูลสินค้า
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('product.create') }}" role="button">
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
                      <h4 class="card-title">รายการสินค้าทั้งหมด {{ $product->total() }} รายการ</h4>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสสินค้า</th>
                              <th>โค้ดสินค้า</th>
                              <th>ชื่อสินค้า</th>
                              <th>ประเภทสินค้า</th>
                              <th>จำนวนสินค้า</th>
                              <th>ราคาสินค้า</th>
                              <th>เครื่องมือ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                        foreach ($product_stock as $item) {
                                            $total_product_stock = $item->stock;
                                            foreach ($sell_stock as $item_sell) {
                                                $total_stock = $item_sell->sell_stock;
                                                $total = $total_product_stock - $total_stock;
                                            }
                                        }
                            ?>
                            @foreach ($product as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td class="text-left">{{ $item->name }}</td>
                                    <td class="text-left">{{ $item->category_name }}</td>
                                    <?php
                                    if($total <= 10)
                                    {
                                        echo "<td><font color=#da1500>$total (จำนวนสินค้าใกล้หมด)</font></td>";
                                    }
                                    else
                                    {
                                       echo "<td>$total</td>";
                                    }
                                    ?>
                                    <td>{{ number_format($item->price,2) }}</td>
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('product.edit',['product_id'=>$item->product_id]) }}" class="btn btn-gradient-success btn-sm">
                                                        <i class="mdi mdi-tooltip-edit"></i>
                                                    </a>
                                                    <form method="POST" class="d-inline"
                                                            action="{{ route('product.destroy',['product_id'=>$item->product_id]) }}"
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
                            {{ $product->links() }}
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

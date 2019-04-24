@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-settings"></i>
        </span>
        ข้อมูลรับสินค้า
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-gradient-success btn-icon-text" href="{{ route('stock.create') }}" role="button">
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
                      <h4 class="card-title">รายการสมาชิกทั้งหมด {{ $stock->total() }} รายการ</h4>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>รหัสการรับสินค้า</th>
                              <th>รหัสสินค้า</th>
                              <th>จำนวนสินค้า</th>
                              <th>วัน/เวลา</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($stock as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->stock_id }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <br>
                            {{ $stock->links() }}
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

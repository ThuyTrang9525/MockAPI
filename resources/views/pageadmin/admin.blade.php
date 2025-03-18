@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="container">
        <div class="col-12 col-md-6" style="background: red; color: white;">Số sản phẩm: {{ count($products) }}</div>
        <div class="col-12 col-md-6" style="background: blue; color: white;">Đã bán:<br />
            <p>Hôm nay: 1</p>
           
            <p>Tháng này: 3</p>
            <p>Năm nay: 4</p>
        </div>
    </div>
    
    <div class="d-flex justify-content-between my-3">
        <h2>Danh sách sản phẩm</h2>
        <a href="" class="btn btn-primary">Xuất ra PDF</a>
    </div>
    
    <table id="table_admin_product" class="table table-striped display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Mô tả</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Đơn vị</th>
                <th>Mới</th>
                <th>
                    <a href="{{ route('admin.add-form') }}" class="btn btn-primary" style="width: 80px;">Thêm</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="source/source/image/product/{{ $product->image }}" alt="image" style="height: 100px;" /></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->id_type }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>{{ $product->promotion_price }}</td>
                <td>{{ $product->unit }}</td>
                <td>{{ $product->new }}</td>
                <td>
                    <a href="{{ route('admin.edit-form', $product->id) }}" class="btn btn-warning" style="width: 80px;">Sửa</a>
                    <form action="{{ route('admin.delete', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width: 80px;" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="space50">&nbsp;</div>
</div>

<script>
    $(document).ready(function() {
        $('#table_admin_product').DataTable();
    });
</script>
@endsection

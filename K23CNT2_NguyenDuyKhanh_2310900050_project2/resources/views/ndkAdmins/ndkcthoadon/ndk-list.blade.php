@extends('_layouts.admins._master')
@section('title','Danh Sách Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Chi Tiết Hóa Đơn</h1>
                <!-- Nút Thêm Mới -->
                <a href="/ndk-admins/ndk-ct-hoa-don/ndk-create" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hóa Đơn ID</th>
                        <th>Sản Phẩm ID</th>
                        <th>Số Lượng Mua</th>
                        <th>Đơn Giá Mua</th>
                        <th>Thành Tiền </th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($ndkcthoadons as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->ndkHoaDonID }}</td>
                            <td>{{ $item->ndkSanPhamID }}</td>
                            <td>{{ $item->ndkSoLuongMua }}</td>
                            <td>{{ $item->ndkDonGiaMua }}</td>
                            <td>{{ $item->ndkThanhTien }}</td>
                        
                            <td>
                                @if($item->ndkTrangThai == 0)
                                    <span class="badge bg-primary">Hoàn Thành</span>
                                @elseif($item->ndkTrangThai == 1)
                                    <span class="badge bg-success">Trả Lại</span>
                                @else
                                    <span class="badge bg-danger">Xóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Các nút chức năng với icon -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="/ndk-admins/ndk-ct-hoa-don/ndk-detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="/ndk-admins/ndk-ct-hoa-don/ndk-edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="/ndk-admins/ndk-ct-hoa-don/ndk-delete/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Khách Hàng này không? ID: {{ $item->id }}');" title="Xóa">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                            
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Chưa có thông tin Hóa Đơn
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
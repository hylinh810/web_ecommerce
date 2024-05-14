@if($coupon)
<div class="card-coupon mt-10 mb-20">
    <div class="remove-coupon" onclick="removeCoupon()">x</div>
    <div style="font-size: 13px;color: gray;position: absolute;right:5px;bottom: 10px;">Đang sử dụng</div>
    <span style="color: #dc3545">{{ $coupon['coupon_name'] }}</span>
    @if($coupon['coupon_type'] == 1)
        <p style="color: #dc3545"><b>Giảm {{ $coupon['coupon_value'] }}% tổng giá trị đơn hàng trên {{ number_format($coupon['coupon_condition'], 0) }}đ (giảm tối đa {{ number_format($coupon['max_discount'], 0) }}đ)</b></p>
    @else
        <p style="color: #dc3545"><b>Giảm {{ number_format($coupon['coupon_value'],0) }}đ tổng giá trị cho đơn hàng trên {{ number_format($coupon['coupon_condition'], 0) }}đ</b></p>
    @endif
    <span style="color: #dc3545">HSD: {{ $coupon['coupon_expire'] }}</span>
</div>
@else
@endif

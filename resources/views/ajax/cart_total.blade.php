@if($coupon)
<div class="cart_totals  text-right">
    <h2>Tổng tiền</h2>
    <div class="cart-subtotal">
        <span>Thành tiền</span>    
        <span id="subtotal">{{ number_format($total, 0) }}đ</span>    
    </div>
    <div class="cart-subtotal">
        <span>Khuyến mãi: </span>  
        @if($coupon['coupon_type'] == 1)  
            @php
                $discount = ($total*$coupon['coupon_value'])/100;
                if($discount > $coupon['max_discount']) {
                    $discount = $coupon['max_discount'];
                }
            @endphp
            <span>-{{ number_format($discount, 0) }}đ</span> 
        @else
            <span>-{{ number_format($coupon['coupon_value'], 0) }}đ</span> 
        @endif   
    </div>
    <div class="order-total">
        <span><strong>Tổng cộng</strong> </span> 
        @if($coupon['coupon_type'] == 1)     
            @php
                $total_remain = $total - $discount;
            @endphp    
            <span id="total"><strong>{{ number_format( $total_remain, 0) }}đ </strong> </span>
        @else
            @php
                $total_remain = $total - $coupon['coupon_value'];
            @endphp  
            <span id="total"><strong>{{ number_format($total_remain, 0) }}đ </strong> </span>
        @endif
    </div>
    <div class="wc-proceed-to-checkout">
        <a href="check-out">Thanh toán đơn hàng</a>
    </div>
 </div>    
@else
<div class="cart_totals  text-right">
    <h2>Tổng tiền</h2>
    <div class="cart-subtotal">
        <span>Thành tiền</span>    
        <span id="subtotal">{{ number_format($total, 0) }}đ</span>    
    </div>
    <div class="cart-subtotal">
        <span>Khuyến mãi: </span>  
        <span>0đ</span>  
    </div>
    <div class="order-total">
        <span><strong>Tổng cộng</strong> </span>          
        <span id="total"><strong>{{ number_format($total, 0) }}đ </strong> </span>
    </div>
    <div class="wc-proceed-to-checkout">
        <a href="check-out">Thanh toán đơn hàng</a>
    </div>
 </div>  
@endif


<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    @include('admin.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="checkout-container">
        <!-- Customer Information Section -->
        <div>
            <div class="checkout-card">
                <h2 class="checkout-title">Your Details</h2>
                <form action="{{ url('confirm_order') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        @if(!Auth::user())
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                        @else
                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div style="display: flex; align-items: center;">
                            <span style="padding: 0.75rem; background: var(--gray); border: 1px solid var(--border); border-right: none; border-radius: 8px 0 0 8px;">+880</span>
                            @if(!Auth::user())
                                <input type="text" id="phone" name="phone" class="form-control" style="border-radius: 0 8px 8px 0; flex: 1;" placeholder="Enter your phone number" required>
                            @else
                                <input type="text" id="phone" name="phone" class="form-control" style="border-radius: 0 8px 8px 0; flex: 1;" value="{{ Auth::user()->phone }}" required>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address (Optional)</label>
                        @if(!Auth::user())
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                        @else
                            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="address" class="form-label">Delivery Address</label>
                        @if(!Auth::user())
                            <input type="text" id="address" name="address" class="form-control" placeholder="House no, thana, street, direction etc" required>
                        @else
                            <input type="text" id="address" name="address" class="form-control" value="{{ Auth::user()->address }}" required>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Delivery Zone</label>
                        <div class="delivery-options">
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="dhaka" required>
                                <span>Inside Dhaka</span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="suburban" required>
                                <span>Sub-Urban</span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery_zone" value="outside_dhaka" required>
                                <span>Outside Dhaka</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="note" class="form-label">Delivery Instructions (Optional)</label>
                        <textarea id="note" name="note" class="form-control" rows="3" placeholder="Add your delivery instructions"></textarea>
                    </div>
                </div>
            </div>
            <div>
                    <!-- Cart Items Section -->
                    <div class="checkout-card">
                        <h2 class="checkout-title">Your Order</h2>
                        <table class="cart-items">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $value = 0; @endphp
                                @foreach($cart as $caart)
                                    <tr>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 1rem;">
                                                <img src="{{ asset($caart->product->image) }}" class="cart-item-img">
                                                <span>{{ $caart->product->title }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $caart->product->price }} BDT</td>
                                        <td>
                                            <a href="{{ url('remove_cart', $caart->id) }}" class="btn-remove">Remove</a>
                                        </td>
                                    </tr>
                                    @php $value += $caart->product->price; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                        <!-- Order Summary Section -->
                    <div class="summary-card checkout-card">
                        <h2 class="checkout-title">Order Summary</h2>
                        
                        <div class="form-group">
                            <label class="form-label">Payment Method</label>
                            <div class="delivery-options">
                                <label class="delivery-option">
                                    <input type="radio" name="payment_method" value="cod" checked required>
                                    <span style="color:white">Cash on Delivery</span>
                                </label>
                            </div>
                        </div>

                        <div class="promo-code">
                            <input type="text" class="promo-input" placeholder="Promo Code">
                            <button type="button" class="btn-apply">Apply</button>
                        </div>

                        <div>
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>{{ $value }} BDT</span>
                            </div>
                            <div class="summary-row">
                                <span>VAT / TAX (0%)</span>
                                <span>0 BDT</span>
                            </div>
                            <div class="summary-row">
                                <span>Delivery Charge</span>
                                <span id="delivery-charge">0 BDT</span>
                            </div>
                            <div class="summary-row">
                                <span>Total</span>
                                <span id="total-price">{{ $value }} BDT</span>
                                <input type="hidden" name="val" value="{{ $value }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-confirm">Confirm Order</button>
                </div>
                

                </form>
            </div>
                </div>
                
                <p class="note-text" style="color:yellow">We'll contact you once the order is confirmed</p>
                
            
       
        
        <!-- footer section -->
        @include('home.footer')
        <!-- end footer section -->
        
        <!-- scripts -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        
        <!-- Delivery charge dynamic calculation -->
        <script>
            const subtotal = {{ $value }};
            const deliveryCharges = {
                dhaka: 60,
                suburban: 100,
                outside_dhaka: 120
            };

            document.querySelectorAll('input[name="delivery_zone"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedZone = this.value;
                    const deliveryCharge = deliveryCharges[selectedZone];
                    document.getElementById('delivery-charge').textContent = deliveryCharge + ' BDT';
                    const total = subtotal + deliveryCharge;
                    document.getElementById('total-price').textContent = total + ' BDT';
                });
            });
        </script>

    </body>
</html>
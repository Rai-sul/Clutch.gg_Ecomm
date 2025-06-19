<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->

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
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $value = 0; @endphp
                                @foreach($cart as $caart)
                                <tr 
                                    data-cart-id="{{ $caart->id }}"
                                    data-product-id="{{ $caart->product->id }}"
                                    data-stock="{{ $caart->product->quantity }}"
                                    data-price="{{ $caart->product->price }}"
                                >
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            <img src="{{ asset($caart->product->image) }}" class="cart-item-img">
                                            <span>{{ $caart->product->title }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="controls">
                                            <div class="quantity-box">
                                                <button type="button" class="decreaseBtn">−</button>
                                                <span class="quantity-number">{{ $caart->quantity }}</span>
                                                <button type="button" class="increaseBtn">+</button>
                                            </div>
                                        </div>
                                        <div class="stock-info">
                                            <span class="stockInfo">In Stock: {{ $caart->product->quantity }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="total-price">{{ $caart->product->price * $caart->quantity }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('remove_cart', $caart->id) }}" class="btn-remove text-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @php $value += $caart->product->price * $caart->quantity; @endphp
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
                                <span>Subtotal:</span> 
                                <strong><span id="subtotal">{{ $value }} </span></strong>
                            </div>
                            <div class="summary-row">
                                <span>VAT / TAX (0%)</span>
                                <strong><span>0 BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>Delivery Charge:</span> 
                                <strong><span id="delivery-charge">0 BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>Total:</span> 
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
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Delivery charge dynamic calculation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const csrfToken = '{{ csrf_token() }}';
            let deliveryCharge = 0;
            const deliveryCharges = {
                dhaka: 60,
                suburban: 100,
                outside_dhaka: 120
            };

            function recalculateSubtotal() {
                let subtotal = 0;
                document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                    const unitPrice = parseFloat(row.dataset.price);
                    const quantity = parseInt(row.querySelector(".quantity-number").textContent);
                    subtotal += unitPrice * quantity;
                });
                document.getElementById("subtotal").textContent = subtotal.toFixed(2) + " BDT";
                const total = subtotal + deliveryCharge;
                document.getElementById("total-price").textContent = total.toFixed(2) + " BDT";
            }

            // Listen to delivery zone changes
            document.querySelectorAll('input[name="delivery_zone"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    const selectedZone = this.value;
                    deliveryCharge = deliveryCharges[selectedZone];
                    document.getElementById('delivery-charge').textContent = deliveryCharge + ' BDT';
                    recalculateSubtotal(); // recalculate total with new delivery charge
                });
            });

            // ========== Cart Quantity Update ==========
            document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                const cartId = row.dataset.cartId;
                const productId = row.dataset.productId;
                let stock = parseInt(row.dataset.stock) || 0;
                const unitPrice = parseFloat(row.dataset.price) || 0;
                let quantityEl = row.querySelector(".quantity-number");
                let quantity = parseInt(quantityEl.textContent) || 1;
                const increaseBtn = row.querySelector(".increaseBtn");
                const decreaseBtn = row.querySelector(".decreaseBtn");
                const stockInfo = row.querySelector(".stockInfo");
                const totalPriceEl = row.querySelector(".total-price");

                function updateUI() {
                    quantityEl.textContent = quantity;
                    stockInfo.textContent = `In Stock: ${stock}`;
                    const itemTotal = unitPrice * quantity;
                    totalPriceEl.textContent = itemTotal.toFixed(2) + " BDT";

                    increaseBtn.disabled = stock <= 0;
                    decreaseBtn.disabled = quantity <= 1;

                    recalculateSubtotal();
                }

                increaseBtn.addEventListener("click", function () {
                    if (stock > 0) {
                        fetch("{{ route('cart.increment') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ cart_id: cartId, product_id: productId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                quantity++;
                                stock = data.stock;
                                updateUI();
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                });

                decreaseBtn.addEventListener("click", function () {
                    if (quantity > 1) {
                        fetch("{{ route('cart.decrement') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ cart_id: cartId, product_id: productId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                quantity--;
                                stock = data.stock;
                                updateUI();
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    }
                });

                updateUI(); // initialize
            });
        });
    </script>






  <!-- SHop_selection's Script -->
  <!-- Notyf JS -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @include('home.cartJS')
</body>

</html>
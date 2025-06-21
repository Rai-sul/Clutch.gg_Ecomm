<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Mobile-specific viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <!-- Mobile cart optimizations -->
    <link rel="stylesheet" href="{{ asset('css/mobile-cart.css') }}">
    
    <!-- Mobile-specific styles -->
    <style>
        /* Mobile responsive styles for cart page */
        @media (max-width: 767px) {
            .checkout-container {
                grid-template-columns: 1fr;
                padding: 0;
                margin: 1rem auto;
                gap: 1rem;
            }
            
            .checkout-card {
                padding: 1rem;
                margin-bottom: 1rem;
                border-radius: 8px;
            }
            
            .checkout-title {
                font-size: 1.2rem;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
            }
            
            .form-group {
                margin-bottom: 1rem;
            }
            
            .form-control {
                padding: 0.6rem;
                font-size: 0.95rem;
            }
            
            .delivery-option {
                padding: 0.6rem;
            }
            
            .cart-items {
                font-size: 0.9rem;
            }
            
            .cart-items th, .cart-items td {
                padding: 0.5rem;
            }
            
            .cart-item-img {
                width: 50px;
                height: 50px;
            }
            
            .controls {
                padding: 10px 5px;
            }
            
            .quantity-box {
                padding: 5px 10px;
            }
            
            .quantity-box button {
                width: 25px;
                font-size: 16px;
            }
            
            .quantity-number {
                margin: 0 10px;
            }
            
            .btn-confirm {
                padding: 0.8rem;
            }
            
            .note-text {
                margin-top: 1rem;
                font-size: 0.85rem;
            }
            
            /* Improve cart item display on very small screens */
            @media (max-width: 430px) {
                .cart-items {
                    display: block;
                }
                
                .cart-items thead {
                    display: none;
                }
                
                .cart-items tbody, .cart-items tr, .cart-items td {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
                
                .cart-items tr {
                    margin-bottom: 1rem;
                    padding-bottom: 1rem;
                    border-bottom: 1px solid var(--border);
                    position: relative;
                }
                
                .cart-items td {
                    border: none;
                    padding: 0.4rem 0;
                }
                
                .cart-items td:nth-child(1) {
                    font-weight: bold;
                }
                
                .cart-items td:nth-child(4) {
                    position: absolute;
                    top: 0;
                    right: 0;
                }
                
                .stock-info {
                    font-size: 0.8rem;
                    margin-top: 0.3rem;
                }
            }
        }
    </style>
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
                    <div class="checkout-card order-card">
                        <div class="order-header">
                            <h2 class="checkout-title">Your Order</h2>
                            <span class="item-count">{{ count($cart) }} {{ count($cart) == 1 ? 'item' : 'items' }}</span>
                        </div>
                        
                        <div class="cart-items-container">
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
                                        class="cart-item-row"
                                    >
                                        <td>
                                            <div class="product-info-container">
                                                <div class="product-image-wrapper">
                                                    <img src="{{ asset($caart->product->image) }}" class="cart-item-img" alt="{{ $caart->product->title }}">
                                                </div>
                                                <div class="product-details">
                                                    <span class="product-title">{{ $caart->product->title }}</span>
                                                    <span class="product-price-mobile">{{ $caart->product->price }} BDT</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="controls">
                                                <div class="quantity-box">
                                                    <button type="button" class="decreaseBtn" aria-label="Decrease quantity">−</button>
                                                    <span class="quantity-number">{{ $caart->quantity }}</span>
                                                    <button type="button" class="increaseBtn" aria-label="Increase quantity">+</button>
                                                </div>
                                            </div>
                                            <div class="stock-info">
                                                <i class="fas fa-box"></i> <span class="stockInfo">{{ $caart->product->quantity }} in stock</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="total-price">{{ $caart->product->price * $caart->quantity }} BDT</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('remove_cart', $caart->id) }}" class="btn-remove" aria-label="Remove item">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $value += $caart->product->price * $caart->quantity; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        @if(count($cart) == 0)
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Your cart is empty</p>
                            <a href="{{ url('/') }}" class="continue-shopping">Continue Shopping</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div>
                        <!-- Order Summary Section -->
                    <div class="summary-card checkout-card">
                        <h2 class="checkout-title">Order Summary</h2>
                        
                        <div class="form-group payment-method-group">
                            <label class="form-label">Payment Method</label>
                            <div class="delivery-options">
                                <label class="delivery-option payment-option">
                                    <input type="radio" name="payment_method" value="cod" checked required>
                                    <span class="payment-label">
                                        <i class="fas fa-money-bill-wave"></i>
                                        Cash on Delivery
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="promo-code">
                            <input type="text" class="promo-input" placeholder="Enter Promo Code">
                            <button type="button" class="btn-apply">
                                <i class="fas fa-tag"></i> Apply
                            </button>
                        </div>

                        <div class="summary-details">
                            <div class="summary-row">
                                <span>Subtotal:</span> 
                                <strong><span id="subtotal">{{ $value }} BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>VAT / TAX (0%)</span>
                                <strong><span>0 BDT</span></strong>
                            </div>
                            <div class="summary-row">
                                <span>Delivery Charge:</span> 
                                <strong><span id="delivery-charge">0 BDT</span></strong>
                            </div>
                            <div class="summary-row total-row">
                                <span>Total:</span> 
                                <span id="total-price">{{ $value }} BDT</span>
                                <input type="hidden" name="val" value="{{ $value }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-confirm">
                            <span class="btn-text">Confirm Order</span>
                            <i class="fas fa-check-circle" style="margin-left: 8px;"></i>
                        </button>
                        
                        <div class="secure-checkout">
                            <i class="fas fa-lock"></i> Secure Checkout
                        </div>
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
            
            // Fix for iOS devices to ensure proper viewport height
            function setViewportHeight() {
                const vh = window.innerHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
            }
            
            setViewportHeight();
            window.addEventListener('resize', setViewportHeight);
            
            // Add loading state to confirm button
            const form = document.querySelector('form');
            const confirmBtn = document.querySelector('.btn-confirm');
            
            if (form && confirmBtn) {
                form.addEventListener('submit', function(e) {
                    // Basic form validation
                    const name = document.getElementById('name');
                    const phone = document.getElementById('phone');
                    const address = document.getElementById('address');
                    const deliveryZones = document.querySelectorAll('input[name="delivery_zone"]');
                    
                    let isValid = true;
                    let checkedZone = false;
                    
                    // Check required fields
                    if (!name.value.trim()) {
                        name.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!phone.value.trim()) {
                        phone.parentElement.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!address.value.trim()) {
                        address.style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    // Check if a delivery zone is selected
                    deliveryZones.forEach(zone => {
                        if (zone.checked) {
                            checkedZone = true;
                        }
                    });
                    
                    if (!checkedZone) {
                        document.querySelector('.delivery-options').style.borderColor = '#f05454';
                        isValid = false;
                    }
                    
                    if (!isValid) {
                        e.preventDefault();
                        // Scroll to first error
                        const firstError = document.querySelector('[style*="border-color: #f05454"]');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        return;
                    }
                    
                    // Show loading state
                    confirmBtn.classList.add('loading');
                    confirmBtn.querySelector('.btn-text').style.opacity = '0';
                    confirmBtn.querySelector('i').style.display = 'none';
                });
            }
            
            // Reset border color on input
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                });
            });
            
            // Reset border color on radio change
            document.querySelectorAll('input[name="delivery_zone"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelector('.delivery-options').style.borderColor = '';
                });
            });
        });
    </script>

  <!-- SHop_selection's Script -->
  <!-- Notyf JS -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @include('home.cartJS')
</body>

</html>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
      const notyf = new Notyf();
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      function updateCartCount() {
          fetch("{{ route('cart_count') }}")
              .then(response => response.json())
              .then(data => {
                  document.getElementById('cart-count').innerText = data.count;
              });
      }

      updateCartCount();

    // Function to update all instances of a product's stock status
    function updateAllProductInstances(productId, stockLevel) {
        // Update all stock indicators for this product
        document.querySelectorAll(`#stock-${productId}`).forEach(stockElement => {
            if (stockElement) {
                // Update stock count badge
                stockElement.textContent = stockLevel > 0 ? `${stockLevel} in stock` : 'Out of stock';
                stockElement.className = `stock-count badge ${stockLevel > 0 ? 'bg-success' : 'bg-danger'}`;
            }
        });

        // Update all add to cart buttons for this product
        document.querySelectorAll(`.service-card button[data-product-id="${productId}"]`).forEach(button => {
            if (stockLevel > 0) {
                button.className = 'add-to-cart-btn';
                button.disabled = false;
                button.textContent = 'Add To Cart';
            } else {
                button.className = 'out-of-stock-btn';
                button.disabled = true;
                button.textContent = 'Out Of Stock';
            }
        });

        // Update all product cards' overlay
        document.querySelectorAll(`.service-card a[href*="product_details/${productId}"]`).forEach(link => {
            const card = link.closest('.service-card');
            if (card) {
                // Check if overlay already exists
                let overlay = link.querySelector('.out-of-stock-overlay');
                
                if (stockLevel === 0 && !overlay) {
                    // Create overlay if it doesn't exist
                    overlay = document.createElement('div');
                    overlay.className = 'out-of-stock-overlay';
                    
                    const text = document.createElement('span');
                    text.className = 'out-of-stock-text';
                    text.innerText = 'Out of Stock';
                    
                    overlay.appendChild(text);
                    link.appendChild(overlay);
                } else if (stockLevel > 0 && overlay) {
                    // Remove overlay if stock is available
                    overlay.remove();
                }
            }
        });
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.productId;
            const sessionId = this.dataset.sessionId;
            
            // Add loading state
            this.classList.add('loading');
            this.disabled = true;

            fetch("{{ route('add_cart') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ 
                    product_id: productId,
                    s_id: sessionId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    notyf.success(data.message);
                    updateCartCount();

                    // If we're on the cart page, refresh to show the new item with animation
                    if (window.location.pathname.includes('mycart')) {
                        window.location.href = "/mycart?added=true";
                        return;
                    }

                    // Update all instances of this product on the page
                    updateAllProductInstances(data.product_id, data.stock);
                    
                    // Remove loading state
                    this.classList.remove('loading');
                    
                    // If stock is now zero, update this button
                    if (data.stock === 0) {
                        this.disabled = true;
                        this.classList.add('disabled');
                        this.classList.remove('add-to-cart-btn');
                        this.classList.add('out-of-stock-btn');
                        this.innerText = "Out of Stock";
                    } else {
                        this.disabled = false;
                    }
                } else {
                    notyf.error(data.message);
                    this.classList.remove('loading');
                    this.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                notyf.error('Something went wrong!');
                this.classList.remove('loading');
                this.disabled = false;
            });
        });
    });

    // Check for newly added items (if redirected from add-to-cart)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('added') && urlParams.get('added') === 'true') {
        // Get the last cart item and add the animation class
        const cartItems = document.querySelectorAll('.cart-item-row');
        if (cartItems.length > 0) {
            const lastItem = cartItems[cartItems.length - 1];
            lastItem.classList.add('new-item');
            
            // Scroll to the new item if needed
            setTimeout(() => {
                lastItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        }
        
        // Clean up URL
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }

    // Fix for back button navigation
    // Store the current URL in history state when the page loads
    const currentUrl = window.location.href;
    history.replaceState({ url: currentUrl }, document.title, currentUrl);
    
    // Listen for back/forward button presses
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.url) {
            // If we have a URL in the state, navigate to it
            window.location.href = event.state.url;
        } else {
            // Fallback - reload the page
            window.location.reload();
        }
    });
});
</script>
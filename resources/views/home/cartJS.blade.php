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

                    // Update stock
                    let stockElement = document.getElementById(`stock-${productId}`);
                    if (stockElement) {
                        let currentStockText = stockElement.innerText.match(/\d+/);
                        let currentStock = currentStockText ? parseInt(currentStockText[0]) : 0;

                        if (currentStock > 0) {
                            currentStock -= 1;

                            if (currentStock === 0) {
                                stockElement.classList.remove('bg-success');
                                stockElement.classList.add('bg-danger');
                                stockElement.innerText = `Out of Stock`;

                                let button = document.querySelector(`button[data-product-id="${productId}"]`);
                                if (button) {
                                    button.disabled = true;
                                    button.classList.add('disabled');
                                    button.innerText = "Out of Stock";
                                }
                            } else {
                                stockElement.innerText = `In Stock ${currentStock}`;
                            }
                        }
                    }
                    
                    // Remove loading state
                    this.classList.remove('loading');
                    this.disabled = false;
                } else if (data.status === 'exists') {
                    notyf.success(data.message);
                    this.classList.remove('loading');
                    this.disabled = false;
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
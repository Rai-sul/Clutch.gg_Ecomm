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
                } else if (data.status === 'exists') {
                    notyf.success(data.message);
                } else {
                    notyf.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                notyf.error('Something went wrong!');
            });
        });
    });
});
</script>
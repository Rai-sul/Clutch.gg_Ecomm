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


//  for serach button


    const searchForm = document.querySelector('.search-form');
    const toggleSearchBtn = document.getElementById('toggle-search');
    const input = document.getElementById('product-search');
    const suggestionBox = document.getElementById('search-suggestions');

    // Toggle Search Box
    toggleSearchBtn.addEventListener('click', () => {
        searchForm.classList.toggle('active');

        if (searchForm.classList.contains('active')) {
            input.focus();
        } else {
            // Add smooth closing delay
            input.blur();
            setTimeout(() => {
                input.value = '';
                suggestionBox.style.display = 'none';
                suggestionBox.innerHTML = '';
            }, 200); // gives CSS transition time
        }
    });

    // Fetch Suggestions on Input
    input.addEventListener('input', function () {
        const query = this.value.trim();

        if (query.length >= 2) {
            fetch(`/search-products?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    suggestionBox.innerHTML = '';

                    if (data.length > 0) {
                        suggestionBox.style.display = 'block';

                        data.forEach(product => {
                            const item = document.createElement('a');
                            item.href = `/product_details/${product.id}`;
                            item.classList.add('dropdown-item', 'd-flex', 'align-items-center');

                            item.innerHTML = `
                                <img src="${product.image}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                <div>
                                    <strong>${product.title}</strong><br>
                                    <span>৳${product.price}</span>
                                </div>
                            `;

                            suggestionBox.appendChild(item);
                        });
                    } else {
                        suggestionBox.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Search error:', error);
                    suggestionBox.style.display = 'none';
                });
        } else {
            suggestionBox.style.display = 'none';
        }
    });

    // Optional: Close suggestions when clicking outside
    document.addEventListener('click', (e) => {
        if (!searchForm.contains(e.target)) {
            searchForm.classList.remove('active');
            input.value = '';
            suggestionBox.style.display = 'none';
        }
    })

</script>
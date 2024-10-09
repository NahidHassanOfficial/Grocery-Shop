<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="alert alert-danger" role="alert">
            You’ve got FREE delivery. Start checkout now!
        </div>

        <div>
            <div class="py-3">
                <ul class="list-group list-group-flush" id="productList">

                    {{-- @foreach ($items as $item) --}}

                    {{-- @endforeach --}}

                </ul>
            </div>
            <div class="d-grid">

                <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit">
                    Go to
                    Checkout <span class="fw-bold" id="totalAmmount"></span></button>
            </div>
        </div>
    </div>
    <script>
        const offcanvas = document.getElementById('offcanvasRight');

        offcanvas.addEventListener('shown.bs.offcanvas', function() {
            getCartLists();
        });

        async function getCartLists() {
            const response = await axios.get('{{ route('cart.info') }}');

            let totalAmmount = 0;
            let totalDiv = document.getElementById('totalAmmount');

            let productList = document.getElementById('productList');
            productList.innerHTML = ''; // Clear the list
            response.data.forEach(function(product, index) {
                let productImages = JSON.parse(product['product']['image']);
                totalAmmount += parseFloat(product['product']['price']) * product['quantity'];
                let row = `
            <li class="list-group-item py-3 px-0 border-top">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{ asset('images/products') }}/${productImages[0]}" alt="Ecommerce" class="img-fluid">
                    </div>
                    <div class="col-5">
                        <h6 class="mb-0">${product['product']['name']}</h6>
                        <span><small class="text-muted">.98 / lb</small></span>
                        <div class="mt-2 small"> <button onclick="removeItem(${product['product_id']})" class="bg-none btn btn-sm text-danger"> <span
                                    class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17">
                                        </line>
                                        <line x1="14" y1="11" x2="14" y2="17">
                                        </line>
                                    </svg></span>Remove</button></div>
                    </div>
                    <div class="col-3">
                        <div class="input-group input-spinner  flex-nowrap justify-content-center  ">
                            <input onclick="qtyDown(${product['product_id']})" type="button" value="-"
                                class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                                data-field="quantity">
                            <input type="number" step="1" max="10" value="${product['quantity']}" name="quantity"
                                class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                            <input onclick="qtyUp(${product['product_id']})" type="button" value="+"
                                class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                                data-field="quantity">
                        </div>
                    </div>
                    <div class="col-2 text-end">
                        <span class="fw-bold">${product['product']['price']}</span>
                    </div>
                </div>
            </li>
        `;
                productList.innerHTML += row; // Append the row to the list
            });
            totalDiv.innerText = totalAmmount;
        }

        async function qtyUp(productID) {
            let response = await axios.post('{{ route('add.cart') }}', {
                productID: productID,
                'quantity': 1,
            })
            if (response.data['status'] === 'success') {
                successToast('Qunatity Increased');
                getCartLists();
            }
        }
        async function qtyDown(productID) {
            let response = await axios.post('{{ route('add.cart') }}', {
                productID: productID,
                'quantity': -1,
            })
            if (response.data['status'] === 'success') {
                successToast('Qunatity Decreased');
                getCartLists();
            }
        }

        async function removeItem(productID) {
            let response = await axios.post('{{ route('remove.cart') }}', {
                productID: productID,
            })
            if (response.data['status'] === 'success') {
                successToast('Removed');
                getCartLists();
            }
        }
    </script>
</div>

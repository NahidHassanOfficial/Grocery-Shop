 <x-front-end.layouts.master>
     <div class="mt-4">
         <div class="container">
             <!-- row -->
             <div class="row ">
                 <!-- col -->
                 <div class="col-12">
                     <!-- breadcrumb -->
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                             <li class="breadcrumb-item"><a href="product_filter.html">Shop</a></li>
                             <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     <!-- section -->



     <section class="my-14">
         <div class="container">
             <!-- row -->
             <div class="row">
                 <div class="offset-lg-1 col-lg-10">
                     <div class="mb-8">
                         <!-- heading -->
                         <h1 class="mb-1">My Wishlist</h1>
                         <p>There are 5 products in this wishlist.</p>
                     </div>
                     <div>
                         <!-- table -->
                         <div class="table-responsive">
                             <table class="table text-nowrap">
                                 <thead class="table-light">
                                     <tr>
                                         <th>
                                             <!-- form check -->
                                             <div class="form-check">
                                                 <!-- input --><input class="form-check-input" type="checkbox"
                                                     value="" id="chechboxOne">
                                                 <!-- label --><label class="form-check-label" for="chechboxOne">

                                                 </label>
                                             </div>
                                         </th>
                                         <th></th>
                                         <th>Product</th>
                                         <th>Amount</th>
                                         <th>Status</th>
                                         <th>Actions</th>
                                         <th>Remove</th>
                                     </tr>
                                 </thead>
                                 <tbody id="tbody">
                                     @foreach ($products as $item)
                                         <tr>

                                             <td class="align-middle">
                                                 <!-- form check -->
                                                 <div class="form-check">
                                                     <!-- input --><input class="form-check-input" type="checkbox"
                                                         value="" id="chechboxTwo">
                                                     <!-- label --><label class="form-check-label" for="chechboxTwo">

                                                     </label>
                                                 </div>

                                             </td>
                                             <td class="align-middle">
                                                 <a
                                                     href="{{ route('product.view', [$item->product->category->slug, $item->product->slug]) }}">
                                                     <img src="{{ asset('images/products/' . (is_array(json_decode($item->product->image)) ? json_decode($item->product->image)[0] : 'default.jpg')) }}"
                                                         class="img-fluid icon-shape icon-xxl" alt="">
                                                 </a>


                                             </td>
                                             <td class="align-middle">
                                                 <div>
                                                     <h5 class="fs-6 mb-0"><a
                                                             href="{{ route('product.view', [$item->product->category->slug, $item->product->slug]) }}"
                                                             class="text-inherit">{{ $item->product->name }}</a>
                                                     </h5>
                                                     <small>$.98 / lb</small>
                                                 </div>
                                             </td>
                                             <td class="align-middle">
                                                 {{ $item->product->sale_price ? $item->product->sale_price : $item->product->price }}
                                             </td>

                                             @if ($item->product->stock && $item->product->status)
                                                 <td class="align-middle"><span class="badge bg-success ">in
                                                         stock</span>
                                                 </td>
                                                 <td class="align-middle">
                                                     <button onclick="addProductCart({{ $item->product->id }})"
                                                         class="btn btn-primary btn-sm">
                                                         Add to Cart
                                                     </button>
                                                 </td>
                                             @else
                                                 <td class="align-middle"><span class="badge bg-danger ">out of
                                                         stock</span>
                                                 </td>
                                                 <td class="align-middle">
                                                     <button class="btn btn-info btn-sm">
                                                         Contact Us </button>
                                                 </td>
                                             @endif

                                             <td class="align-middle text-center"><a
                                                     onclick="deleteItem({{ $item->product->id }})" class="text-muted"
                                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                     <i class="feather-icon icon-trash-2"></i>
                                                 </a></td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <script>
         async function addProductCart(productID) {
             let response = await axios.post('{{ route('add.cart') }}', {
                 productID: productID,
                 'quantity': 1,
             })
             if (response.data['status'] === 'success') {
                 successToast('Added to cart')
             }
         }

         async function deleteItem(productID) {
             try {
                 let response = await axios.post('{{ route('remove.wish-list.item') }}', {
                     productID: productID,
                 })
                 if (response.data['status'] === 'success') {
                     successToast('Removed Successfully')
                 }
             } catch (error) {
                 errorToast('Something Wrong!')
             }
         }
     </script>

 </x-front-end.layouts.master>

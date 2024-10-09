<x-back-end.layouts.master>
    <main class="main-content-wrapper">
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <!-- pageheader -->
                        <div>
                            <h2>Categories</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ route('dash.category.add') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Category"
                                            aria-label="Search" />
                                    </form>
                                </div>
                                <!-- select option -->
                                <div class="col-xl-2 col-md-4 col-12">
                                    <select class="form-select">
                                        <option selected>Status</option>
                                        <option value="Published">Published</option>
                                        <option value="Unpublished">Unpublished</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll" />
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Proudct</th>
                                            <th>Status</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="categoryOne" />
                                                        <label class="form-check-label" for="categoryOne"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#!"><img
                                                            src="{{ asset('images/categories/' . $category->image) }}"
                                                            alt="" class="icon-shape icon-sm" /></a>
                                                </td>
                                                <td><a href="{{ route('category.view', $category->slug) }}"
                                                        class="text-reset">{{ $category->name }}</a></td>
                                                <td>{{ $category->products_count }}</td>

                                                <td>
                                                    @if ($category->status)
                                                        <span
                                                            class="badge bg-light-primary text-dark-primary">Published</span>
                                                    @else
                                                        <span
                                                            class="badge bg-light-danger text-dark-primary">Unpublished</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="feather-icon icon-more-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" onclick="deleteCategory()">
                                                                    <i class="bi bi-trash me-3"></i>
                                                                    Delete
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('dash.category.editPage', $category->id) }}">
                                                                    <i class="bi bi-pencil-square me-3"></i>
                                                                    Edit
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div
                            class="border-top d-flex justify-content-between align-items-md-center px-6 py-6 flex-md-row flex-column gap-4">
                            <span>Showing 1 to 8 of 12 entries</span>
                            <nav>
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="#!">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        async function deleteCategory() {
            let response = await axios.get('{{ route('dash.category.delete', $category->id) }}')
            if (response.data.status == 'success') {
                successToast(response.data.message);
            }
        }
    </script>
</x-back-end.layouts.master>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-green-300 text-black hover:text-black-700 focus:text-black-700 shadow-lg navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
            <button class="navbar-toggler text-black-500 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                    </path>
                </svg>
            </button>
            <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
                <a class="text-xl text-black" href="#">Watcher</a>
                <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                    <li class="nav-item px-2 text-black-500">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a class="nav-link text-black-500 hover:text-black-700 focus:text-black-700 p-0" href="{{ route('dashboard.products') }}">Products</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a class="nav-link text-black-500 hover:text-black-700 focus:text-black-700 p-0" href="{{ route('dashboard.export') }}">Export</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8 mx-auto px-4 sm:px-8">
        <!-- add product button -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold leading-tight">Products</h1>
            <button class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>
        </div>

        <div id="card-product" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        </div>
    </div>

    <!-- modal add product -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <form class="py-4 px-4" id="add-product-form">
                        <div class="mb-3">
                            <label for="product-name" class="block text-sm font-medium leading-5 text-gray-700">Product Name</label>
                            <input type="text" class="form-input border-2 mt-1 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="product-name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="product-description" class="block text-sm font-medium leading-5 text-gray-700">Product Description</label>
                            <input type="text" class="form-input border-2 mt-1 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="product-description" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="product-stock" class="block text-sm font-medium leading-5 text-gray-700">Product Stock</label>
                            <input type="number" class="form-input border-2 mt-1 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="product-stock" name="stock">
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="block text-sm font-medium leading-5 text-gray-700">Product price</label>
                            <input type="number" class="form-input border-2 mt-1 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="product-price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="product-image" class="block text-sm font-medium leading-5 text-gray-700">Product Image</label>
                            <input type="file" class="form-input border-2 mt-1 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" id="product-image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="product-store" class="block text-sm font-medium leading-5 text-gray-700">Product Store</label>
                            <select class="mt-1 border-2 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" aria-label="Default select example" id="product-store" name="store_id">
                                <option selected>Open this select menu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product-category" class="block text-sm font-medium leading-5 text-gray-700">Product Category</label>
                            <select class="mt-1 border-2 block w-full py-2 px-3 leading-5 rounded-md text-gray-900 transition duration-150 ease-in-out sm:text-sm sm:leading-5" aria-label="Default select example" id="product-category" name="category_id">
                                <option selected>Open this select menu</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-green-300 hover:bg-green-400 text-black font-bold py-2 px-4 rounded">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }

        fetch('https://king-prawn-app-lkgw3.ondigitalocean.app/product')
            .then(response => response.json())
            .then(result => {
                const cardProductContainer = document.querySelector('#card-product')
                console.log(result.data)
                result.data.forEach(product => {
                    const cardProduct = `
                        <div class="mb-8 rounded-lg shadow-lg bg-white max-w-sm p-4">
                            <div class="relative rounded-md shadow-lg">
                                <a href="javascript:void(0)">
                                    <img class="object-cover w-full h-56 rounded-md" src="${product.image}" alt="${product.name}">
                                </a>
                            </div>
                            <div class="mt-4">
                                <a class="text-sm font-medium leading-5 text-gray-900" href="javascript:void(0)">${product.category.name}</a>
                                <h2 class="mt-2 text-lg leading-7 font-medium text-gray-900">
                                    <a href="javascript:void(0)">${product.name}</a>
                                </h2>
                                <div class="mt-3">
                                    <span class="text-lg font-medium text-gray-900">Rp. ${product.price}</span>
                                </div>
                                <div class="mt-3">
                                    <button class="bg-red-300 hover:bg-red-400 text-black font-bold py-2 px-4 rounded" data-id="${product.id}">Delete</button>
                                </div>
                            </div>
                        </div>
                        `;
                    const domParser = new DOMParser()
                    const cardProductElement = domParser.parseFromString(cardProduct, 'text/html').body.firstChild
                    cardProductElement.querySelector('button').addEventListener('click', function() {
                        fetch(`https://king-prawn-app-lkgw3.ondigitalocean.app/product/${this.dataset.id}`, {
                                method: 'DELETE'
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.status === 'success') {
                                    this.parentElement.parentElement.parentElement.remove()
                                }
                            })
                    })
                    cardProductContainer.appendChild(cardProductElement)
                })
            })

        fetch('https://king-prawn-app-lkgw3.ondigitalocean.app/product/brands')
            .then(response => response.json())
            .then(result => {
                const productBrand = document.querySelector('#product-store')
                result.data.forEach(brand => {
                    const option = document.createElement('option')
                    option.value = brand.id
                    option.innerHTML = brand.name
                    productBrand.appendChild(option)
                })
            })

        fetch('https://king-prawn-app-lkgw3.ondigitalocean.app/product/categories')
            .then(response => response.json())
            .then(result => {
                const productCategory = document.querySelector('#product-category')
                result.data.forEach(category => {
                    const option = document.createElement('option')
                    option.value = category.id
                    option.innerHTML = category.name
                    productCategory.appendChild(option)
                })
            })

        document.querySelector('#add-product-form').addEventListener('submit', function(e) {
            e.preventDefault()
            const formData = new FormData(this)
            fetch('https://king-prawn-app-lkgw3.ondigitalocean.app/product', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    window.location.reload()
                })
        })
    </script>
</body>

</html>
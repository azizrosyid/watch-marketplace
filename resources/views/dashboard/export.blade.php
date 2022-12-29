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
        <form action="{{ route('dashboard.export') }}" method="POST">
            @csrf
            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="email" type="email" class="form-input py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="email" required autofocus>
            </div>
            <label for="type" class="block text-sm font-medium leading-5 text-gray-700 mt-4">Type</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <select id="type" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="type" required>
                    <option value="orders">Orders</option>
                    <option value="order_items">Order Items</option>
                    <option value="products">Product</option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                    Export
                </button>
            </div>
        </form>
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

        document.querySelector('select').addEventListener('change', function() {
            if (this.value === 'products') {
                // add a new input
                const select = document.createElement('select')
                select.setAttribute('type', 'select')
                select.setAttribute('name', 'store_id')
                select.setAttribute('class', 'py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5')
                select.setAttribute('required', 'required')

                const option = document.createElement('option')
                option.value = ''
                option.innerHTML = 'All'
                option.setAttribute('selected', 'selected')
                select.appendChild(option)

                fetch('https://king-prawn-app-lkgw3.ondigitalocean.app/product/brands')
                    .then(response => response.json())
                    .then(result => {
                        result.data.forEach(brand => {
                            const option = document.createElement('option')
                            option.value = brand.id
                            option.innerHTML = brand.name
                            select.appendChild(option)
                        })
                    })

                this.parentNode.appendChild(select)
            } else {
                // remove the input
                this.parentNode.removeChild(this.parentNode.lastChild)
            }
        })
    </script>
</body>

</html>
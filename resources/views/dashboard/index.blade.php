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
        <div class="flex flex-col">
            <div class="overflow-x-auto ">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        ID
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Buyer
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Product
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Price
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Image
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="text-sm text-gray-900">{{ $order->id }}</div>
                                    </td>
                                    <td>
                                        <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($order->order_items as $product)
                                            <li style="width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $product->product->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="text-sm text-gray-900">
                                            {{ $order->total_price }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($order->image)
                                        <div style="width: 100px; height: 100px; overflow: hidden;">
                                            <img src="{{ $order->image }}" alt="" class="w-full h-full object-cover">
                                        </div>
                                        @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            No Image
                                        </span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap text-sm font-medium">
                                        @if ($order->status == 'PENDING')
                                        <a href="{{ route('dashboard.approve', $order->id) }}" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium rounded">Approve</a>
                                        <a href="{{ route('dashboard.reject', $order->id) }}" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium rounded">Reject</a>
                                        @elseif ($order->status == 'PAID')
                                        <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                            Ship </button>
                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                                                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                    <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                                            Add Tracking Number
                                                        </h5>
                                                        <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('dashboard.addTrackingNumber', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body relative p-4">
                                                            <div class="flex flex-col">
                                                                <label for="tracking_number" class="text-sm font-medium text-gray-700">Tracking Number</label>
                                                                <input type="text" name="tracking_number" id="tracking_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-10 p-3" placeholder="Enter Tracking Number">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                            <button type="button" class="inline-block px-6 py-2.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                                Save changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @elseif ($order->status == 'ON_DELIVERY')
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-700">Tracking Number : </span>
                                            <span class="text-sm font-medium text-gray-700">{{ $order->delivery_code }}</span>
                                        </div>
                                        @elseif ($order->status == 'DELIVERED')
                                        <a href="{{ route('dashboard.sendInvoice', ['order' => $order->id, 'user' => $order->user->id, 'email' => $order->user->email]) }}" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Send Invoice</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    </script>
</body>

</html>
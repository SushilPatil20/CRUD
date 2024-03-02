<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto px-4">
        <div class="w-full mx-auto mt-10 bg-white p-8 rounded-lg shadow-2xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Product</h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                        placeholder="Enter product name" value="{{ $product->product_name }}">
                </div>
                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                        placeholder="Enter product description">
                        {{ $product->product_description }}</textarea>
                </div>
                <!-- Price -->
                <div class="mb-6">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="number" id="price" name="price"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                        placeholder="Enter product price" value="{{ $product->product_price }}">
                </div>
                <!-- Submit Button -->
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg focus:outline-none focus:shadow-outline hover:bg-blue-600">Update
                        Product</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

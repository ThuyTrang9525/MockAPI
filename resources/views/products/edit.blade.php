<!-- resources/views/products/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Sử dụng Tailwind CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Edit User</h2>
            <form action="{{ route('products.update', $product['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block mb-2">Name:</label>
                    <input type="text" name="name" value="{{ $product['name'] }}" required class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Avatar URL:</label>
                    <input type="text" name="avatar" value="{{ $product['avatar'] }}" required class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Update User</button>
            </form>
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-700">Back to User List</a>
            </div>
        </div>
    </div>
</body>
</html>

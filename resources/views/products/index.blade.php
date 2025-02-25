<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Sử dụng Tailwind CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Thêm FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100">
        @if ($errors->any())
            <div class="max-w-lg mx-auto bg-red-100 p-4 rounded-lg shadow-md mb-6">
                <ul class="list-disc pl-5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="/products" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mb-6">
        @csrf
        <h2 class="text-xl font-bold mb-4">Add New User</h2>
        
        <label class="block mb-2">Name:</label>
        <input type="text" name="name" required class="w-full p-2 border border-gray-300 rounded-md mb-4">
        
        <label class="block mb-2">Avatar URL:</label>
        <input type="text" name="avatar" required class="w-full p-2 border border-gray-300 rounded-md mb-4">
        
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Add User</button>
    </form>

    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-center mb-8">User List</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $user)
                <div class="bg-white shadow-md rounded-lg overflow-hidden relative">
                    <div class="p-4 flex items-center">
                        <img class="w-16 h-16 rounded-full mr-4" src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $user['name'] }}</h2>
                            <p class="text-gray-500 text-sm">ID: {{ $user['id'] }}</p>
                            <p class="text-gray-400 text-xs">Created at: {{ \Carbon\Carbon::parse($user['createdAt'])->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Các icon Edit & Delete -->
                    <div class="absolute top-2 right-2 flex space-x-2">
                        <!-- Icon Edit: liên kết tới trang sửa -->
                        <a href="{{ route('products.edit', $user['id']) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Icon Delete: form xóa sử dụng method spoofing -->
                        <form action="{{ route('products.destroy', $user['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

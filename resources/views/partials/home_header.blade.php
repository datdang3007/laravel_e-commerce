<div class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between py-4">
        <div class="flex items-center">
            <span class="text-xl font-bold text-gray-800">E-Commerce</span>
        </div>
        <div class="flex-1 px-4 max-w-xl mx-auto">
            <div class="relative text-gray-600">
                <input type="search" name="search" placeholder="Search" class="bg-white w-full h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                <button type="submit" class="absolute top-1/2 right-0" style="transform: translateY(-50%)">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="flex items-center">
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">Home</a>
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">Shop</a>
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">About</a>
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">Contact</a>
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <div class="relative">
                <button href="#" class="text-gray-800 hover:text-blue-600 toggle-dropdown">
                    <i class="fas fa-user"></i>
                </button>
                <!-- Dropdown profile -->
                <div class="absolute hidden dropdown-menu right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
                <!-- End Dropdown profile -->
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function(){
        $('.toggle-dropdown').click(function(){
            $('.dropdown-menu').toggleClass('hidden');
        });
    });
</script>
@endsection

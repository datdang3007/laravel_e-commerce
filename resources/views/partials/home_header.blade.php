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
            <!-- <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">Home</a>
            <a href="#" class="mr-4 text-gray-800 hover:text-blue-600">Contact</a> -->
            <div class="relative">
                <button class="icon-cart mr-4 text-gray-800 hover:text-blue-600">
                    <i class="fas fa-shopping-cart"></i>
                </button>

                <!-- Dropdown Cart -->
                <div class="absolute hidden dropdown-cart right-0 mt-2 bg-white rounded-md shadow-lg p-2" style="width: 500px">
                    <ul class="text-gray-800"></ul>
                    <button class="w-full mt-4 bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Đặt hàng</button>
                </div>
                <!-- End Dropdown Cart -->
            </div>

            <div class="relative">
                <button class="text-gray-800 hover:text-blue-600 toggle-dropdown">
                    <i class="fas fa-user"></i>
                </button>

                <!-- Dropdown profile -->
                <div class="absolute hidden dropdown-menu right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                    @if ($account)
                        <div class="block px-4 py-2 text-sm text-gray-700"><p>Xin chào, {{ $account->name }}</p></div>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Đăng xuất
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Đăng ký
                        </a>
                    @endif
                </div>
                <!-- End Dropdown profile -->
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(document).ready(function(){
        console.log('icon-cart', $('.icon-cart'));


        $('.toggle-dropdown').click(function(){
            $('.dropdown-menu').toggleClass('hidden');
        });


        $('.icon-cart').click(function() {
            $('.dropdown-cart').toggleClass('hidden');
        });
    });
</script>
@endsection

<div class="w-2/12 bg-white shadow-lg h-screen">
    <div class="flex items-center justify-center ">
        <img src="{{ asset('images\logo.png') }}" alt="Logo" class="w-full">
    </div>
    <ul>
        @foreach ($menuItems as $menuItem)
            <li class="has-submenu">
                <div class="bg-gray-100 px-4 py-2 flex justify-between items-center text-gray-700">
                    <span>{{ $menuItem['name'] }}</span>
                </div>
                <!-- Second-level menu items -->
                <ul>
                    @foreach ($menuItem['children'] as $child)
                        @php
                            $isActive = Request::url() == $child['route']; // Kiểm tra xem URL hiện tại có trùng với URL của mục menu hay không
                        @endphp
                        <li class="pl-6 {{ $isActive ? 'bg-blue-500' : '' }}"><a href="{{ $child['route'] }}" class="inline-block {{ $isActive ? 'text-white' : 'text-gray-600 hover:text-blue-500' }} py-1 my-1">{{ $child['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>

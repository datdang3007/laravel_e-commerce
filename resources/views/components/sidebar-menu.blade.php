<div class="w-2/12 bg-white shadow-lg h-screen">
    <div class="bg-blue-500 w-full h-14 flex items-center justify-center text-white gap-2">
        <i class="fa-solid fa-shop"></i>
        <span class="text-lg">Super Market</span>
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
                        <!-- <li class="hover:text-gray-600 {{ $isActive ? 'text-white' : 'text-gray-600 hover:text-blue-500' }} {{ $isActive ? 'bg-blue-500' : '' }}"> -->
                        <li>
                           <div class="w-full h-full pl-6 cursor-pointer {{ $isActive ? 'text-white bg-blue-500' : 'text-gray-600 hover:text-blue-500' }}">
                                <a href="{{ $child['route'] }}" class="inline-block w-full h-full py-1 my-1">{{ $child['name'] }}</a>
                           </div>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>

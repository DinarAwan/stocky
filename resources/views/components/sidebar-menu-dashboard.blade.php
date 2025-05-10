@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="/users"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs($routeName) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
        {{ $icon }}
        <span class="ml-3" sidebar-toggle-item>  Users  </span>
    </a>
</li>
<li>
    <a href="/produk"
        class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs($routeName) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
        {{ $icon }}
        <span class="ml-3" sidebar-toggle-item>  Product  </span>
    </a>
</li>


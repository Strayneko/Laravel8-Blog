    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" {{-- auto hide message in 4secs --}} x-init="setTimeout(() => show = false, 4000)"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif

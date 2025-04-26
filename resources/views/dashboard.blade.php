<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @auth
                    @if ($role == 'advokat')
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a
                                href="{{ route('pengacara.offering') }}"
                                class="inline-block px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-md text-base leading-normal"
                            >
                                {{ __("Job Offering") }}
                            </a>
                        </div>
                    @else
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a
                                href="{{ route('sewa.pilihkasus') }}"
                                class="inline-block px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-md text-base leading-normal"
                            >
                                {{ __("Sewa Pengacara!") }}
                            </a>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a
                                href="https://wa.me/{{ $phone_number }}?text={{ $message }}"
                                class="inline-block px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-md text-base leading-normal"
                            >
                                {{ __("Tanya NusRobo!") }}
                            </a>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a
                                href="{{ route('pengacara.getregister') }}"
                                class="inline-block px-6 py-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-md text-base leading-normal"
                            >
                                {{ __("Bergabung Sebagai Mitra Dvokat!") }}
                            </a>
                        </div>
                    @endif
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center gap-4">
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-6 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            {{ __("Log in") }}
                        </a>
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-6 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800"
                        >
                            {{ __("Register") }}
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
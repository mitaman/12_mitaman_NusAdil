<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pilih Pengacara') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('sewa') }}">
                        @csrf

                        <!-- Kategori Kasus -->
                        <div class="mb-4">
                            <label for="advokat_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Berikut adalah mitra advokat kami yang ahli dalam bidang '). $kategoriKasus }}
                            </label>
                            <select name="advokat_id" id="advokat_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($advokats as $advokat)
                                    <option value="{{ $advokat['id'] }}">{{ $advokat['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="text" name="kategori_kasus_id" value="{{ $kategori_kasus_id }}" hidden>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
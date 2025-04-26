<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sewa Pengacara!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('sewa.create') }}">
                        @csrf

                        <!-- Pengacara -->
                        <div class="mb-4">
                            <label for="pengacara_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Pilih Pengacara') }}
                            </label>
                            <!-- <select name="pengacara_id" id="pengacara_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($advokats as $advokat)
                                    <option value="{{ $advokat['id'] }}">{{ $advokat['name'] }}</option>
                                @endforeach
                            </select> -->
                            <input type="text" name="advokat_nama" id="advokat_nama" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" disabled value="{{ $advokat_name }}">
                            <input type="text" name="advokat_id" value="{{ $advokat_id }}" hidden>
                        </div>

                        <!-- Topik Kasus -->
                        <div class="mb-4">
                            <label for="topik_kasus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Topik Kasus') }}
                            </label>
                            <input type="text" name="topik_kasus" id="topik_kasus" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" disabled value="{{ $kategori_kasus_name }}">
                            <input type="text" name="kategori_kasus_id" value="{{ $kategori_kasus_id }}" hidden>
                        </div>

                        <!-- Deskripsi Kasus -->
                        <div class="mb-4">
                            <label for="deskripsi_kasus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Deskripsi Kasus') }}
                            </label>
                            <textarea name="deskripsi_kasus" id="deskripsi_kasus" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

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
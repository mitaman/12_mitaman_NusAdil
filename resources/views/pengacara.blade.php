<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register Pengacara!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('pengacara.register') }}" id="register-form">
                        {{ csrf_field() }}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nama') }}
                            </label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" disabled value="{{ Auth::user()->name }}">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Email') }}
                            </label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" disabled value="{{ Auth::user()->email }}">
                        </div>

                        <div class="mb-4">
                            <label for="nia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('NIA') }}
                            </label>
                            <input type="text" name="nia" id="nia" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Tanggal Lahir') }}
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Alamat Rumah') }}
                            </label>
                            <input type="text" name="alamat" id="alamat" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="alamat_kantor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Alamat Kantor') }}
                            </label>
                            <input type="text" name="alamat_kantor" id="alamat_kantor" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="mb-4">
                            <label for="kategori_kasus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Pilih Kategori Kasus (Multiple)') }}
                            </label>
                            <select name="kategori_kasus[]" id="kategori_kasus" multiple required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($kategoriKasus as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                {{ __('Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.') }}
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- <script>
    $(document).ready(() => {
        const form = $("#register-form");

        Swal.fire({
            title: "Konfirmasi",
            text: "Tolong periksa input sebelum menekan submit.",
            icon: "info",
            showCancelButton: true,
            reverseButtons: true,
        }).then((submit) => {
            if (submit.isConfirmed) {
                form.submit();
            } else {
                Swal.fire("", "Anda membatalkan proses ini", "error");
            }
        })
    });
</script> -->
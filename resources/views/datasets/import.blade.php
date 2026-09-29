<x-app-layout>

    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            Import CSV Dataset
        </h1>

        <p class="text-gray-600 mt-2">
            Import a CSV file into an existing dataset.
        </p>

        @if(session('success'))
            <div class="mt-6 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mt-6 p-4 bg-red-100 text-red-800 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mt-6 p-4 bg-red-100 text-red-800 rounded-lg">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('datasets.import.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8 border rounded-lg p-6"
        >

            @csrf

            <!-- Dataset -->

            <div>
                <label class="block font-semibold mb-2">
                    Select Dataset
                </label>

                <select
                    name="dataset_id"
                    class="w-full border rounded-lg p-3"
                    required
                >
                    <option value="">
                        Select a dataset
                    </option>

                    @foreach($datasets as $dataset)
                        <option
                            value="{{ $dataset->id }}"
                            {{ old('dataset_id') == $dataset->id ? 'selected' : '' }}
                        >
                            {{ $dataset->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Table Name -->

            <div class="mt-5">

                <label class="block font-semibold mb-2">
                    Table Name
                </label>

                <input
                    type="text"
                    name="table_name"
                    value="{{ old('table_name') }}"
                    placeholder="customer_shopping"
                    class="w-full border rounded-lg p-3"
                    required
                >

                <p class="text-sm text-gray-500 mt-1">
                    Use only letters, numbers, and underscores.
                </p>

            </div>


            <!-- CSV -->

            <div class="mt-5">

                <label class="block font-semibold mb-2">
                    CSV File
                </label>

                <input
                    type="file"
                    name="file"
                    accept=".csv,.txt"
                    class="w-full border rounded-lg p-3"
                    required
                >

            </div>


            <!-- Submit -->

            <button
                type="submit"
                class="mt-6 px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800"
            >
                Import CSV
            </button>

        </form>

    </div>

</x-app-layout>
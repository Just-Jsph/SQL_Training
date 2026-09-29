<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            Datasets
        </h1>

        <p class="text-gray-600 mt-2">
            Select a dataset to practice SQL.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">

            @forelse($datasets as $dataset)

                <div class="border rounded-lg p-6">

                    <h2 class="text-xl font-bold">
                        {{ $dataset->name }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ $dataset->description }}
                    </p>

                    <p class="text-sm mt-4">
                        {{ $dataset->tables->count() }} tables
                    </p>

                    <a
                        href="{{ route('datasets.show', $dataset) }}"
                        class="inline-block mt-5 bg-blue-600 text-white px-4 py-2 rounded"
                    >
                        View Dataset
                    </a>

                </div>

            @empty

                <p>No datasets available.</p>

            @endforelse

        </div>

    </div>

</x-app-layout>
</body>
</html>
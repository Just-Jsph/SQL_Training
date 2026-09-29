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

        <a
            href="{{ route('datasets.index') }}"
            class="text-blue-600"
        >
            ← Back to Datasets
        </a>

        <h1 class="text-3xl font-bold mt-5">
            {{ $dataset->name }}
        </h1>

        <p class="text-gray-600 mt-2">
            {{ $dataset->description }}
        </p>

        <h2 class="text-2xl font-bold mt-8">
            Tables
        </h2>

        <div class="grid md:grid-cols-2 gap-5 mt-5">

            @forelse($dataset->tables as $table)

                <div class="border rounded-lg p-5">

                    <h3 class="text-xl font-bold">
                        {{ $table->name }}
                    </h3>

                    <p class="text-gray-600 mt-2">
                        {{ $table->description }}
                    </p>

                    <p class="text-sm mt-3">
                        Table:
                        <strong>
                            {{ $table->table_name }}
                        </strong>
                    </p>

                    <a
                        href="{{ route('datasets.table', [$dataset, $table]) }}"
                        class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded"
                    >
                        Open Table
                    </a>

                </div>

            @empty

                <p>No tables available.</p>

            @endforelse

        </div>

    </div>

</x-app-layout>
</body>
</html>
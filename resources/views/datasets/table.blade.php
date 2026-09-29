<x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            {{ $dataset->name }}
        </h1>

        <p class="text-gray-600 mt-2">
            {{ $dataset->description }}
        </p>

        <div class="mt-8">

            <h2 class="text-xl font-bold">
                Dataset Tables
            </h2>

            @if($dataset->tables->count() > 0)

                <div class="mt-4 space-y-4">

                    @foreach($dataset->tables as $table)

                        <div class="border rounded-lg p-5">

                            <h3 class="text-lg font-bold">
                                {{ $table->name }}
                            </h3>

                            <p class="text-gray-600 mt-1">
                                Database table:
                                {{ $table->table_name }}
                            </p>

                            @if($table->description)
                                <p class="text-gray-600 mt-2">
                                    {{ $table->description }}
                                </p>
                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="mt-4 border rounded-lg p-6">
                    <p class="text-gray-600">
                        No tables have been imported into this dataset yet.
                    </p>

                    <a
                        href="{{ route('datasets.import') }}"
                        class="inline-block mt-4 px-5 py-3 bg-black text-white rounded-lg"
                    >
                        Import CSV
                    </a>
                </div>

            @endif

        </div>

    </div>

</x-app-layout>
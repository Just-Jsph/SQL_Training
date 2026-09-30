<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            {{-- HEADER --}}
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-900">
                    SQL Playground
                </h1>

                <p class="mt-2 text-gray-600">
                    Write and execute SQL queries against the training dataset.
                </p>

            </div>


            {{-- SQL EDITOR --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

                <h2 class="text-lg font-semibold text-gray-900 mb-4">
                    SQL Query
                </h2>

                <form
                    method="POST"
                    action="{{ route('playground.execute') }}"
                >

                    @csrf

                    <textarea
                        name="sql"
                        rows="12"
                        class="w-full border border-gray-300 rounded-lg p-4 font-mono text-sm text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="SELECT * FROM customer_shopping LIMIT 10;"
                        required
                    >{{ old('sql') }}</textarea>


                    <div class="mt-4">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg transition"
                        >
                            Run SQL
                        </button>

                    </div>

                </form>

            </div>


            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div class="mt-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">

                    <strong>Success:</strong>

                    {{ session('success') }}

                </div>

            @endif


            {{-- SQL ERROR --}}
            @if(session('sql_error'))

                <div class="mt-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">

                    <strong>SQL Error:</strong>

                    {{ session('sql_error') }}

                </div>

            @endif


            {{-- RESULTS --}}
            @if(session('results'))

    @php
        $results = session('results');
    @endphp

    <div class="mt-8 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <div class="p-6 border-b border-gray-200">

            <h2 class="text-lg font-semibold text-gray-900">
                Query Results
            </h2>

        </div>

        @if(count($results) > 0)

            @php
                $firstRow = (array) $results[0];
                $columns = array_keys($firstRow);
            @endphp

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            @foreach($columns as $column)

                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                                    {{ $column }}
                                </th>

                            @endforeach

                        </tr>

                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($results as $row)

                            @php
                                $row = (array) $row;
                            @endphp

                            <tr class="hover:bg-gray-50">

                                @foreach($columns as $column)

                                    <td class="px-6 py-4 text-sm text-gray-700">

                                        {{ $row[$column] ?? '' }}

                                    </td>

                                @endforeach

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="p-6 text-gray-500">

                Query executed successfully, but returned no rows.

            </div>

        @endif

    </div>

@endif

        </div>

    </div>

</x-app-layout>
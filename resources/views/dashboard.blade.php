<x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            SQL Training Dashboard
        </h1>

        <p class="text-gray-600 mt-2">
            Track your SQL learning progress.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5 mt-8">

            <div class="border rounded-lg p-5">
                <p class="text-gray-600">
                    Total Questions
                </p>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalQuestions }}
                </p>
            </div>

            <div class="border rounded-lg p-5">
                <p class="text-gray-600">
                    Completed
                </p>

                <p class="text-3xl font-bold mt-2">
                    {{ $completed }}
                </p>
            </div>

            <div class="border rounded-lg p-5">
                <p class="text-gray-600">
                    Remaining
                </p>

                <p class="text-3xl font-bold mt-2">
                    {{ $remaining }}
                </p>
            </div>

            <div class="border rounded-lg p-5">
                <p class="text-gray-600">
                    Attempts
                </p>

                <p class="text-3xl font-bold mt-2">
                    {{ $attempts }}
                </p>
            </div>

        </div>

        <div class="mt-8 border rounded-lg p-6">

            <h2 class="text-xl font-bold">
                Accuracy
            </h2>

            <p class="text-4xl font-bold mt-3">
                {{ $accuracy }}%
            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-5 mt-8">

            <a
                href="{{ route('datasets.index') }}"
                class="border rounded-lg p-6 hover:bg-gray-50"
            >
                <h2 class="text-xl font-bold">
                    Datasets
                </h2>

                <p class="text-gray-600 mt-2">
                    Explore SQL training datasets.
                </p>
            </a>

            <a
                href="{{ route('questions.index') }}"
                class="border rounded-lg p-6 hover:bg-gray-50"
            >
                <h2 class="text-xl font-bold">
                    Question Bank
                </h2>

                <p class="text-gray-600 mt-2">
                    Practice SQL questions.
                </p>
            </a>

            <a
                href="{{ route('playground.index') }}"
                class="border rounded-lg p-6 hover:bg-gray-50"
            >
                <h2 class="text-xl font-bold">
                    SQL Playground
                </h2>

                <p class="text-gray-600 mt-2">
                    Practice SQL freely.
                </p>
            </a>

        </div>

    </div>

</x-app-layout>
<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                SQL Training Dashboard
            </h1>

            <p class="mt-2 text-gray-600">
                Track your SQL learning progress and practice your skills.
            </p>

        </div>


        {{-- STATISTICS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">


            {{-- TOTAL QUESTIONS --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Total Questions
                </p>

                <p class="text-3xl font-bold mt-2 text-gray-900">
                    {{ $totalQuestions }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    Available for practice
                </p>

            </div>


            {{-- COMPLETED --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Completed
                </p>

                <p class="text-3xl font-bold mt-2 text-green-600">
                    {{ $completed }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    Questions completed
                </p>

            </div>


            {{-- REMAINING --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Remaining
                </p>

                <p class="text-3xl font-bold mt-2 text-blue-600">
                    {{ $remaining }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    Questions to practice
                </p>

            </div>


            {{-- ATTEMPTS --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">

                <p class="text-sm font-medium text-gray-500">
                    Attempts
                </p>

                <p class="text-3xl font-bold mt-2 text-purple-600">
                    {{ $attempts }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    Total attempts
                </p>

            </div>

        </div>


        {{-- PROGRESS --}}
        <div class="mt-6 bg-white border border-gray-200 rounded-xl p-6 shadow-sm">

            @php
                $progressWidth = min((float) $accuracy, 100);
            @endphp

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-lg font-bold text-gray-900">
                        Your Progress
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Overall question completion
                    </p>

                </div>

                <span class="text-2xl font-bold text-gray-900">
                    {{ $accuracy }}%
                </span>

            </div>


            {{-- PROGRESS BAR --}}
            <div class="w-full bg-gray-200 rounded-full h-3 mt-5">

                <div
                    class="bg-blue-600 h-3 rounded-full transition-all duration-500"
                    @style(['width' => $progressWidth . '%'])
                ></div>

            </div>

        </div>


        {{-- QUICK ACTIONS --}}
        <div class="mt-8">

            <h2 class="text-xl font-bold text-gray-900 mb-4">
                Quick Access
            </h2>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                {{-- DATASETS --}}
                <a
                    href="{{ route('datasets.index') }}"
                    class="group bg-white
                    border border-gray-200
                    rounded-xl p-6 shadow-sm
                    hover:shadow-md hover:border-blue-400
                    transition"
                >

                    <div class="text-3xl mb-4">
                        📊
                    </div>

                    <h3 class="text-lg font-bold text-gray-900">
                        Datasets
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Explore the datasets available for SQL practice.
                    </p>

                    <p class="mt-4 text-blue-600 font-medium">
                        Open Datasets →
                    </p>

                </a>


                {{-- QUESTIONS --}}
                <a
                    href="{{ route('questions.index') }}"
                    class="group bg-white
                    border border-gray-200
                    rounded-xl p-6 shadow-sm
                    hover:shadow-md hover:border-blue-400
                    transition"
                >

                    <div class="text-3xl mb-4">
                        📝
                    </div>

                    <h3 class="text-lg font-bold text-gray-900">
                        Question Bank
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Practice SQL questions based on different topics.
                    </p>

                    <p class="mt-4 text-blue-600 font-medium">
                        Practice Questions →
                    </p>

                </a>


                {{-- PLAYGROUND --}}
                <a
                    href="{{ route('playground.index') }}"
                    class="group bg-white
                    border border-gray-200
                    rounded-xl p-6 shadow-sm
                    hover:shadow-md hover:border-blue-400
                    transition"
                >

                    <div class="text-3xl mb-4">
                        💻
                    </div>

                    <h3 class="text-lg font-bold text-gray-900">
                        SQL Playground
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Practice SQL queries without a specific question.
                    </p>

                    <p class="mt-4 text-blue-600 font-medium">
                        Open Playground →
                    </p>

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
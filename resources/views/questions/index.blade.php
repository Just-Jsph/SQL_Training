<x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            SQL Question Bank
        </h1>
<form method="GET" action="{{ route('questions.index') }}" class="flex gap-3 mb-6">

    <select
    name="difficulty"
    class="border border-gray-300 rounded px-3 py-2 pr-10 bg-white w-48">
        <option value="">All Difficulties</option>

        <option
            value="Beginner"
            {{ request('difficulty') == 'Beginner' ? 'selected' : '' }}
        >
            Beginner
        </option>

        <option
            value="Intermediate"
            {{ request('difficulty') == 'Intermediate' ? 'selected' : '' }}
        >
            Intermediate
        </option>

        <option
            value="Advanced"
            {{ request('difficulty') == 'Advanced' ? 'selected' : '' }}
        >
            Advanced
        </option>
    </select>


    <select
    name="topic"
    class="border border-gray-300 rounded px-3 py-2 pr-10 bg-white w-56"
    >
        <option value="">All Topics</option>

        @foreach($topics as $topic)
            <option
                value="{{ $topic }}"
                {{ request('topic') == $topic ? 'selected' : '' }}
            >
                {{ $topic }}
            </option>
        @endforeach
    </select>


    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
    >
        Filter
    </button>

</form>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mt-8">

            @forelse($questions as $question)

                <div class="border rounded-lg p-5">

                    <div class="flex justify-between">

                        <h2 class="font-bold text-lg">
                            {{ $question->title }}
                        </h2>

                        <span class="text-sm">
                            {{ $question->difficulty }}
                        </span>

                    </div>

                    <p class="text-gray-600 mt-3">
                        {{ $question->description }}
                    </p>

                    <p class="text-sm mt-3">
                        Topic:
                        <strong>{{ $question->topic }}</strong>
                    </p>

                    <a
                        href="{{ route('questions.show', $question) }}"
                        class="inline-block mt-5 bg-blue-600 text-white px-4 py-2 rounded"
                    >
                        Practice
                    </a>

                </div>

            @empty

                <p>No questions available.</p>

            @endforelse

        </div>

    </div>

</x-app-layout>
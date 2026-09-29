<x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-3xl font-bold">
            SQL Question Bank
        </h1>

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
    <form method="GET" class="flex gap-3 mb-6">

    <select name="difficulty" class="border rounded">

        <option value="">
            All Difficulties
        </option>

        <option value="Beginner">
            Beginner
        </option>

        <option value="Intermediate">
            Intermediate
        </option>

        <option value="Advanced">
            Advanced
        </option>

    </select>

    <select name="topic" class="border rounded">

        <option value="">
            All Topics
        </option>

        @foreach($topics as $topic)

            <option value="{{ $topic }}">
                {{ $topic }}
            </option>

        @endforeach

    </select>

    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded"
    >
        Filter
    </button>

</form>

</x-app-layout>
<x-app-layout>

    <div class="max-w-4xl mx-auto p-6">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">
                Create Question
            </h1>

            <p class="text-gray-600 mt-2">
                Create a new SQL practice question.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 border border-red-300 rounded-lg bg-red-50">
                <ul class="list-disc ml-5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('questions.store') }}"
            method="POST"
            class="space-y-6"
        >

            @csrf

            <div>
                <label class="block font-medium mb-2">
                    Question
                </label>

                <textarea
                    name="question"
                    rows="4"
                    class="w-full border rounded-lg p-3"
                    placeholder="Example: Display all female customers."
                    required
                >{{ old('question') }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Topic
                </label>

                <input
                    type="text"
                    name="topic"
                    class="w-full border rounded-lg p-3"
                    placeholder="Example: SELECT, WHERE"
                    value="{{ old('topic') }}"
                    required
                >
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Difficulty
                </label>

                <select
                    name="difficulty"
                    class="w-full border rounded-lg p-3"
                    required
                >
                    <option value="">Select difficulty</option>
                    <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>
                        Easy
                    </option>
                    <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>
                        Medium
                    </option>
                    <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>
                        Hard
                    </option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Correct SQL
                </label>

                <textarea
                    name="correct_sql"
                    rows="8"
                    class="w-full border rounded-lg p-3 font-mono"
                    placeholder="SELECT * FROM customer_shopping WHERE gender = 'Female';"
                    required
                >{{ old('correct_sql') }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Hint
                </label>

                <textarea
                    name="hint"
                    rows="3"
                    class="w-full border rounded-lg p-3"
                    placeholder="Give the student a hint..."
                >{{ old('hint') }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Explanation
                </label>

                <textarea
                    name="explanation"
                    rows="5"
                    class="w-full border rounded-lg p-3"
                    placeholder="Explain how to solve the question..."
                >{{ old('explanation') }}</textarea>
            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800"
                >
                    Create Question
                </button>

                <a
                    href="{{ route('questions.index') }}"
                    class="px-6 py-3 border rounded-lg hover:bg-gray-50"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-app-layout>
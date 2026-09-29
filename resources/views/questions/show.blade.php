<x-app-layout>

    <div class="max-w-5xl mx-auto p-6">

        <a
            href="{{ route('questions.index') }}"
            class="text-blue-600"
        >
            ← Back to Questions
        </a>

        <div class="mt-6">

            <div class="flex gap-3">

                <span class="px-3 py-1 bg-gray-100 rounded">
                    {{ $question->difficulty }}
                </span>

                <span class="px-3 py-1 bg-gray-100 rounded">
                    {{ $question->topic }}
                </span>

            </div>

            <h1 class="text-3xl font-bold mt-5">
                {{ $question->title }}
            </h1>

            <p class="mt-4">
                {{ $question->description }}
            </p>

        </div>

        <div class="mt-8">

            <form action="{{ route('sql.check') }}" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="question_id"
                    value="{{ $question->id }}"
                >

                <label class="font-bold">
                    Write your SQL
                </label>

                <textarea
                    name="sql"
                    rows="12"
                    class="w-full border rounded-lg p-4 mt-2 font-mono"
                    placeholder="SELECT ..."
                    required
                ></textarea>

                <button
                    type="submit"
                    class="mt-4 bg-blue-600 text-white px-5 py-2 rounded"
                >
                    Submit Answer
                </button>

            </form>

        </div>

        <div class="mt-6">

            @if(session('success'))

                <div class="bg-green-100 text-green-800 p-4 rounded">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="bg-red-100 text-red-800 p-4 rounded">
                    {{ session('error') }}
                </div>

            @endif

            @if(session('sql_error'))

                <div class="bg-red-100 text-red-800 p-4 rounded">
                    {{ session('sql_error') }}
                </div>

            @endif

        </div>

        <div class="mt-8 border rounded-lg p-5">

            <h2 class="font-bold">
                Hint
            </h2>

            <p class="mt-2">
                {{ $question->hint }}
            </p>

        </div>

        @if(session('show_explanation'))

            <div class="mt-5 border rounded-lg p-5">

                <h2 class="font-bold">
                    Explanation
                </h2>

                <p class="mt-2">
                    {{ $question->explanation }}
                </p>

            </div>

        @endif

    </div>

</x-app-layout>
<x-navbar>
    <div class='px-8 max-w-7xl flex flex-col m-auto'>
        <div class="border-b border-gray-900/10 py-8 px-8 max-w-7xl flex justify-end gap-4">
            <a href='{{ route('question.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Question</a>
            <a href='{{ route('quiz.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Quiz</a>
        </div>
    </div>
    @if (auth()->user()->id == 1)
        <div class='px-8 max-w-7xl py-8'>
            @if ($quiz->active == null)
                <a href='{{ route('quiz.toggle', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Make active</a>
            @else
                <a href='{{ route('quiz.toggle', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Make inactive</a>
            @endif
        </div>
    @endif
    <div class='px-8 max-w-7xl flex flex-col m-auto pt-10 items-center'>
        <h2 class='text-3xl mb-2'>{{ $quiz->name }}</h2>
        <div class='flex flex-col gap-3 items-center'>
            <img src="{{asset('storage/' . $quiz->thumbnail)}}" alt="{{ $quiz->name }}" class="w-1/2 object-cover object-center">
            <p>{{ $quiz->description }}</p>
        </div>
        <div class='flex flex-col mt-10 gap-4'>
            @foreach ($questions as $question)
                <div>{{ $question->question }}</div>
            @endforeach
        </div>

    </div>
</x-navbar>
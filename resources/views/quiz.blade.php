<x-navbar>
    @include('menu')
    <div class='flex'>
        @if (auth()->user()->id == 1)
            <div class='px-8 max-w-7xl py-8'>
                @if ($quiz->active == null)
                    <a href='{{ route('quiz.toggle', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Make active</a>
                @else
                    <a href='{{ route('quiz.toggle', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Make inactive</a>
                @endif
            </div>
        @endif
        @if (auth()->user()->id == 1 || auth()->user()->id == $quiz->user_id)
            <div class='px-8 max-w-7xl py-8'>
                <a href='{{ route('quiz.edit', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Edit Quiz</a>
            </div>
            <div class='px-8 max-w-7xl py-8'>
                <a href='{{ route('quiz.delete', ["id" => $quiz->id]) }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Delete Quiz</a>
            </div>
        @endif
    </div>

    <div class='px-8 max-w-7xl flex flex-col m-auto pt-10 items-center'>
        <h2 class='text-3xl mb-2'>{{ $quiz->name }}</h2>
        <div class='flex flex-col gap-3 items-center'>
            <img src="{{asset('storage/' . $quiz->thumbnail)}}" alt="{{ $quiz->name }}" class="w-1/2 object-cover object-center">
            <p>{{ $quiz->description }}</p>
        </div>
        <div class='flex flex-col mt-10 gap-4'>
            @foreach ($questions as $question)
                <div class='flex gap-4'>
                    <p>{{ $question->question }}</p>
                    <a class='underline' href='{{ route("question.edit", ["id" => $question->id]) }}'>edit</a>
                    <a class='underline' href='{{ route("question.delete", ["id" => $question->id]) }}'>delete</a>
                </div>
            @endforeach
        </div>

    </div>
</x-navbar>
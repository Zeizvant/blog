<x-navbar>
    <div class='px-8 max-w-7xl flex flex-col m-auto'>
        <div class="border-b border-gray-900/10 py-8 px-8 max-w-7xl flex justify-end gap-4">
            <a href='{{ route('question.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Question</a>
            <a href='{{ route('quiz.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Quiz</a>
        </div>
    </div>
    @if ($quizzes)
        <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Quizzes</h2>
                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($quizzes as $quiz)
                        <div class="group relative">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{asset('storage/' . $quiz->thumbnail)}}" alt="{{ $quiz->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                <a href="{{ route('quiz.info', ["id" => $quiz->id]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $quiz->name }}
                                </a>
                                </h3>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
    @endif
</x-navbar>
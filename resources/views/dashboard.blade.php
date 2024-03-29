<x-navbar>
    @include('menu')
    @if ($quizzes && $quizzes->count() > 0)
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Quizzes</h2>
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($quizzes as $quiz)
                    @if (auth()->user()->id == 1 || auth()->user()->id == $quiz->user_id)
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
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    @endif
</x-navbar>
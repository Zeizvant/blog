<x-navbar>
    <div class='px-8 max-w-7xl flex  flex-col m-auto'>
        <div class="border-b border-gray-900/10 py-8 px-8 max-w-7xl flex justify-end gap-4">
            <a href='{{ route('question.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Question</a>
            <a href='{{ route('quiz.add') }}' class="bg-indigo-600 rounded-md px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Add Quiz</a>
        </div>
    </div>
</x-navbar>
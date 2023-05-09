<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' .$instapp->image) }}" width="200px" alt="">
                            </td>
                            <td><h2 class="card-title">{{ $instapp->title }}</h2></td>
                        </tr>
                        <form action="{{ route('comments.store', $instapp->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea name="comment" class="input input-bordered" id="" cols="130" rows="10" placeholder="Comment Something..."></textarea>
                            <input type="submit" class="btn btn-primary" value="Comment">
                        </form>
                        @foreach ($instapp->comments as $comment)
                    <div class="card card-side shadow-xl bg-primary mt-10">
                        <div class="card-body">

                            <h2 class="card-title">{{ $comment->user->name}}</h2>
                            <h2 class="card-title">{{ $comment->created_at->diffForHumans() }}</h2>
                            <h2 class="card-title">{{ $comment->comment }}</h2>

                            <div class="text-end">
                                @can('delete', $comment)
                                <form action="{{ route('comments.destroy', [$instapp->id, $comment->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger link link-hover text-red-400">
                                        Delete
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

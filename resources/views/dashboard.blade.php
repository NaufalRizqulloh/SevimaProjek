<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <form action="{{ route('instapp.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                Foto
                                <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback text-red-400">{{ $message }} </span>
                                @enderror
                            </div>
                            <textarea name="title" class="input input-bordered form-control @error('tile') is-invalid @enderror" id="" cols="130" rows="10" placeholder="Type Something..."></textarea>
                            @error('title')
                                <span class="invalid-feedback text-red-400">{{ $message }} </span>
                            @enderror
                            <br>
                            <input type="submit" class="btn btn-primary" value="Post">
                        </form>
                    </div>
                @foreach ($instapp as $insta)
                    <div class="card card-side shadow-xl bg-primary mt-10">
                        <div class="card-body">
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' .$insta->image) }}" width="200px" alt="">
                                </td>
                                <td><h2 class="card-title bold">{{ $insta->user->name}}</h2></td>
                                <span>
                                    <h2 class="card-title">{{ $insta->created_at->diffForHumans() }}</h2>
                                </span>
                                <br>
                                <td><h2 class="card-title">{{ $insta->title }}</h2></td>
                                <br>
                                <td>
                                    {{-- <form action="{{ route('like.store') }}" method="post">
                                        @csrf
                                            <button type="submit" class="btn btn-accent ">
                                                    Like
                                            </button>
                                        </form>
                                        Proyek Like di tiadakan karena pembuat tidak sanggup --}}

                                </td>
                            </tr>

                            <div class="text-end">
                                <a href="{{ route('instapp.show', $insta) }}" class="link">
                                    Comment ({{ $insta->comments->count() }})
                                </a>
                                @can('edit', $insta)
                                <br>
                                <a href="{{ route('instapp.edit', $insta) }}" class="link blue">
                                Edit
                                </a>
                                @endcan

                                @can('delete', $insta)
                                <form action="{{ route('instapp.destroy', $insta->id) }}" method="post">
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
</x-app-layout>

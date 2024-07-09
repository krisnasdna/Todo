<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>To Do List</title>
    @vite('resources/css/app.css')
    {{-- <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
    <nav class="bg-white" x-data="{ isOpen: false }" >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center flex-row gap-2">
                <div class="flex-shrink-0 ">
                    <img class="h-8 w-10" src="{{ asset('img/todo-icon.png') }}" alt="Todo App">
                </div>
                <h1 class="text-blue-700 font-bold">TODO APP</h1>
            </div>
            <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
                <!-- Profile dropdown -->
                <div  class="relative ml-3">
                <div>
                    <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </button>
                </div>

                <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
                </div>
            </div>
            </div>
            <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!-- Menu open: "hidden", Menu closed: "block" -->
                <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!-- Menu open: "block", Menu closed: "hidden" -->
                <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
        </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="isOpen"
        x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="md:hidden" id="mobile-menu">

        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
            <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            </div>
        </div>
        </div>
    </nav>
    <main class="pt-10">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8"><h4 class="text-5xl">Welcome <b>{{Auth::user()->name}}</b></h4></div>
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 bg-white rounded-xl">
            <div class="text-center pt-10">
                <h1 class="text-5xl font-bold">Todo List</h1>
            </div>
            <div class="container mx-auto pt-10">
                @if (session('success'))
                    <div class=" flex justify-center justify-items-center w-50">
                        <p class="border-2 border-green-600 bg-green-300 p-3 rounded-xl">{{ session('success') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                <div class="text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                @endif
                <form action="{{ route('todo.post') }}" method="POST">
                    @csrf
                    <div class="pt-5 flex md:flex-row flex-col gap-3 justify-center justify-items-center w-full"> 
                        <div class="w-full md:w-4/12"><input type="text" class="border-2 border-black rounded-xl p-3 w-full" name="title" placeholder="Title Task" required value="{{ old('title') }}"></div>
                        <div class="w-full"><input type="text" class="border-2 border-black rounded-xl p-3 w-full" name="task" placeholder="Description Task" required value="{{ old('task') }}"></div>
                        <div class="w-full md:w-4/12"><button type="submit" class=" ps-5 rounded-xl p-3 border-2 border-black w-full">Simpan</button></div> 
                    </div>
                </form>
            </div>
            <div class="text-right pt-3 ">
                <form action="{{ route('todo') }}" method="GET">
                    <input type="text" class="border-2 border-black rounded-xl outline-none p-1 px-3" name="search" value="{{ request('search') }}" placeholder="Search Tasks.....">
                    <button class="btn btn-secondary" type="submit"></button>
                </form>
            </div>
            <div class="container pt-5" x-data="{ isOpen: false }">
                <h1 class="py-5 text-2xl font-bold capitalize">Pending Tasks</h1>
                <div class="grid xl:grid-cols-3 sm:grid-cols-1 grid-flow-row gap-4">
                    @foreach ($data as $todo)
                    <div class="p-5 bg-red-300 rounded-xl">
                        <div class="flex flex-row justify-center gap-3">
                            <div class="grow">
                                <h1 class="font-bold tracking-wide capitalize text-xl">{{ $todo->title }}</h1>
                                <p class="pt-2">{{ $todo->tasks }}</p>
                            </div>
                            <div class="text-right">
                                <div class="flex flex-col gap-3 justify-center justify-items-center">
                                    <form action="{{ route('todo.delete',['id'=>$todo->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>✕</button>
                                    </form>
                                    <button @click="isOpen = '{{ $loop->index }}'" >✎</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                    x-show="isOpen === '{{ $loop->index}}'"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="origin-top-right rounded-xl shadow-lg"
                    >
                    <div class="rounded-xl p-5 bg-white shadow-xs">
                        <form action="{{ route('todo.update',['id'=>$todo->id]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="flex flex-row justify-center gap-3">
                                <div class="grow">
                                    <div class=""> 
                                        <input type="text" class="outline-none border-none font-bold tracking-wide capitalize text-xl " name="title" value="{{ $todo->title }}">
                                    </div>
                                    <div class="pt-3">
                                        <input type="text" class="outline-none border-none tracking-wide " name="task" value="{{ $todo->tasks}}">
                                    </div>
                                    <div class="flex pt-3">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $todo->is_done == '1' ? 'Checked':'' }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done"  {{ $todo->is_done == '0' ? 'Checked':'' }}> Belum
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="flex flex-col gap-3 justify-center justify-items-center">
                                        <button class="" type="submit">✎</button>
                                        <div @click="isOpen = false" class="cursor-pointer">✕</div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container pt-10"  x-data="{ isOpen: '1' }" >
                <h1 class="py-5 text-2xl font-bold capitalize">Completed Tasks</h1>
                <div class="grid xl:grid-cols-3 sm:grid-cols-1 grid-flow-row gap-4">
                    @foreach ($datadone as $tododone)
                    <div class="p-5 bg-green-300 rounded-xl">
                        <div class="flex flex-row justify-center gap-3">
                            <div class="grow">
                                <h1 class="font-bold tracking-wide capitalize text-xl">{{ $tododone->title }}</h1>
                                <p class="pt-2">{{ $tododone->tasks }}</p>
                            </div>
                            <div class="text-right">
                                <div class="flex flex-col gap-3 justify-center justify-items-center">
                                    <form action="{{ route('todo.delete',['id'=>$tododone->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>✕</button>
                                    </form>
                                    <button @click="isOpen = '{{ $loop->index }}'" >✎</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                    x-show="isOpen === '{{ $loop->index}}'"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="origin-top-right rounded-xl shadow-lg"
                    >
                    <div class="rounded-xl p-5 bg-white shadow-xs">
                        <form action="{{ route('todo.update',['id'=>$tododone->id]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="flex flex-row justify-center gap-3">
                                <div class="grow">
                                    <input type="text" class="outline-none font-bold tracking-wide capitalize text-xl" name="task"
                                    value="{{ $tododone->tasks }}">
                                    <div class="flex pt-3">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $tododone->is_done == '1' ? 'Checked':'' }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done"  {{ $tododone->is_done == '0' ? 'Checked':'' }}> Belum
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="flex flex-col gap-3 justify-center justify-items-center">
                                        <button class="" type="submit">✎</button>
                                        <div @click="isOpen = false" class="cursor-pointer">✕</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>
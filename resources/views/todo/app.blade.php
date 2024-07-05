<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
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
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
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
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            </div>
        </div>
        </div>
    </nav>
    <main class="pt-10">
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
                    <div class="text-center pt-5">
                        <input type="text" class="border-2 border-black rounded-xl p-3 w-6/12" name="task" placeholder="Tambahkan Task Baru" required value="{{ old('task') }}">
                        <button type="submit" class=" ps-5 rounded-xl p-3 border-2 border-black">Simpan</button>
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
                <div class="grid grid-cols-3 grid-flow-row gap-4">
                    @foreach ($data as $todo)
                    <div class="p-5 bg-red-300 rounded-xl">
                        <div class="flex flex-row justify-center gap-3">
                            <div class="grow">
                                <h1 class="font-bold tracking-wide capitalize text-xl">{{ $todo->tasks }}</h1>
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
                                    <input type="text" class="outline-none font-bold tracking-wide capitalize text-xl" name="task"
                                    value="{{ $todo->tasks }}">
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
                <div class="grid grid-cols-3 grid-flow-row gap-4">
                    @foreach ($datadone as $tododone)
                    <div class="p-5 bg-green-300 rounded-xl">
                        <div class="flex flex-row justify-center gap-3">
                            <div class="grow">
                                <h1 class="font-bold tracking-wide capitalize text-xl">{{ $tododone->tasks }}</h1>
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

    {{-- <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">Simple To Do List</div>
            <!-- 
            <div class="navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Update Data</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        -->
        </div>
    </nav>
    
    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    @endif
                    <!-- 02. Form input data -->
                    <form id="todo-form" action="{{ route('todo.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="task" id="todo-input"
                                placeholder="Tambah task baru" required value="{{ old('task') }}">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="{{ route('todo') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>
                        
                        <ul class="list-group mb-4" id="todo-list">
                            <!-- 04. Display Data -->
                            @foreach ($data as $todolist)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">{{ $todolist->tasks }}</span>
                                <input type="text" class="form-control edit-input" style="display: none;"
                                    value="{{ $todolist->tasks }}">
                                <div class="btn-group">
                                    <form action="{{ route('todo.delete',['id'=>$todolist->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                    </form>
                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->index}}" aria-expanded="false">✎</button>
                                </div>
                            </li>
                            <!-- 05. Update Data -->
                            <li class="list-group-item collapse" id="collapse-{{ $loop->index}}">
                                <form action="{{ route('todo.update',['id'=>$todolist->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="task"
                                                value="{{ $todolist->tasks }}">
                                            <button class="btn btn-outline-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $todolist->is_done == '1' ? 'Checked':'' }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done"  {{ $todolist->is_done == '0' ? 'Checked':'' }}> Belum
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script> --}}

</body>

</html>
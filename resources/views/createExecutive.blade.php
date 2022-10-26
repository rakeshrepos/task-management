@extends('layouts.app') @section('content')
<div>
    <div class="max-w-2xl mx-auto bg-white p-16">
        <p class="mb-3 text-xl font-bold">Add Executive</p>
        <form action="/executive" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Full Name</label
                    >
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('name')}}"
                    />
                    @error('name')
                    <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Email</label
                    >
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('email')}}"
                    />
                    @error('email')
                    <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Password</label
                    >
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                    />
                    @error('password')
                    <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="password-confirm"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Confirm Password</label
                    >
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password-confirm"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                    />
                </div>
            </div>
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Submit
            </button>
        </form>
    </div>
</div>
@endsection

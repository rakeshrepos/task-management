@extends('layouts.app') @section('content')
<div>
    <div class="max-w-2xl mx-auto bg-white p-16">
        <p class="mb-3 text-xl font-bold">Add Client</p>
        <form action="/client" method="POST">
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
                        >Email Id</label
                    >
                    <input
                        type="email"
                        id="email"
                        name="email"
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
                        for="number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Phone number</label
                    >
                    <input
                        type="tel"
                        name="number"
                        id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="123-45-678"
                        required
                        value="{{old('number')}}"
                    />
                    @error('number')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="aadhar_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Aaddhar Number</label
                    >
                    <input
                        type="text"
                        id="aadhar_number"
                        name="aadhar_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('aadhar_number')}}"
                    />
                    @error('aadhar_number')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="business_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Business Name</label
                    >
                    <input
                        type="text"
                        id="business_name"
                        name="business_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('business_name')}}"
                    />
                    @error('business_name')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="otp"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Client Otp</label
                    >
                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('otp')}}"
                    />
                    @error('otp')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="address"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Address</label
                >
                <textarea
                    id="address"
                    name="address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""
                    required
                >{{old('address')}}</textarea>
                @error('address')
                    <p class="text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label
                        for="pincode"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Pincode</label
                    >
                    <input
                        type="text"
                        id="pincode"
                        name="pincode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('pincode')}}"
                    />
                    @error('pincode')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="gst"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >GST No.</label
                    >
                    <input
                        type="text"
                        id="gst_no"
                        name="gst_no"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        value="{{old('gst_no')}}"
                        required
                    />
                    @error('gst_no')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="team_size"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Team Size</label
                    >
                    <input
                        type="number"
                        id="team_size"
                        name="team_size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('team_size')}}"
                    />
                    @error('team_size')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="requirements"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Requirements</label
                >
                <textarea
                    id="requirements"
                    name="requirements"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""
                    required
                >{{old('requirements')}}</textarea>
                @error('requirements')
                    <p class="text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="notes"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Notes</label
                >
                <textarea
                    id="notes"
                    name="notes"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""
                    required
                >{{old('notes')}}</textarea>
                @error('notes')
                    <p class="text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label
                        for="client_code"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Client Code</label
                    >
                    <input
                        type="text"
                        id="client_code"
                        name="client_code"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('client_code')}}"
                    />
                    @error('client_code')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="lead_source"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Lead Source</label
                    >
                    <input
                        type="text"
                        id="lead_source"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="lead_source"
                        placeholder=""
                        required
                        value="{{old('lead_source')}}"
                    />
                    @error('lead_source')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="sales_person"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Sales Person</label
                    >
                    <input
                        type="text"
                        id="sales_person"
                        name="sales_person"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('sales_person')}}"
                    />
                    @error('sales_person')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="manager"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Manager</label
                    >
                    <input
                        type="text"
                        id="manager"
                        name="manager"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        name="{{old('manager')}}"
                    />
                    @error('manager')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="technical_person"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Technical Person</label
                    >
                    <input
                        type="text"
                        id="technical_person"
                        name="technical_person"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('technical_person')}}"
                    />
                    @error('technical_person')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label
                        for="date_of_start"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Date of Start</label
                    >
                    <input
                        type="date"
                        id="date_of_start"
                        name="date_of_start"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                        value="{{old('date_of_start')}}"
                    />
                    @error('date_of_start')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
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

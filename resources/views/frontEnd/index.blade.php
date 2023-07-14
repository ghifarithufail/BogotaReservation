@extends('layout.default')
@section('content')

    <div class="p-4 sm:ml-52">
        <div class="text-center rounded-lg mt-16 font-medium text-5xl">
            <h1>Reservation</h1>
        </div>
    </div>

    <div class="pl-4 pr-4 ml-52">
        <div class=" text-center pt-4 pl-4 border-2 border-gray-200 shadow  rounded-lg ">
            <form>
                <div class="flex space-x-5">
                    <div class="rounded-lg font-medium text-2xl">
                        <input type="text" name="search" id="search" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Name or Email Customer">
                    </div>
                    <div class="rounded-lg font-medium text-2xl">
                        <input type="text" name="tables" id="tables" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tables">
                    </div>

                    <div class="rounded-lg font-medium text-2xl">
                        <select id="payment" name="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Payment Status</option>
                            <option value="done" @if(request('payment') == 'done') selected @endif>Done</option>
                            <option value="unpaid" @if(request('payment') == 'unpaid') selected @endif>Unpaid</option>
                        </select>
                    </div>


                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        
                        <input datepicker type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" name="date" id="date">
                    </div>
                    <div>
                        <button type="submit"
                            class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-40">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

    <div class="p-4 sm:ml-52">
        <div class="p-4 border-2 border-gray-200 shadow  rounded-lg ">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="zoom: 0.8;">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Guest
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reservation Table
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Payment
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Reservation Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $data)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data->email }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $data->guest }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->Tables->name }} - {{ $data->Tables->table_guest }} people
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($data->status == 'done')
                                        <p1 
                                            class="text-greey bg-green-100 text-green-800 rounded dark:bg-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none dark:text-green-300 border border-green-300 font-medium rounded-lg text-sm px-5 py-0.5 text-center">
                                            {{ $data->status }}</p1>
                                    @elseif($data->status == 'unpaid')
                                        <p1
                                            class="text-white bg-yellow-100 text-yellow-800 rounded dark:bg-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none dark:text-yellow-300 border border-yellow-300 font-medium rounded-lg text-sm px-5 py-0.5 text-center">
                                            {{ $data->status }}</p1></a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $data->date->format('D d-M-Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('reservations.update', $data->id) }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                    </a>
                                    <a href="{{ route('reservations.update', $data->id) }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <div class="p-4 sm:ml-64">
                <div class="text-center rounded-lg mt-20 font-medium text-2xl">
                    {{ $reservations->links() }}
                </div>
            </div> --}}

        </div>
    </div>

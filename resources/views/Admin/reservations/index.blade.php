<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white">Add New Reservation</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name (Username)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephone No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reservation Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Table Name (Id)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Guest Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->id }}
                                </td>
                                <td class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->first_name }} {{ $reservation->last_name }} ({{ $reservation->user->name }})
                                </td>
                                <td class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->tel_number }}
                                </td>
                                <td class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->res_date }}
                                </td>
                                <td class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->table->name }} ({{ $reservation->table->id }})
                                </td>
                                <td class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->guest_number }}
                                </td>
                                <td class="row">
                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="px-3 py-3 bg-green-500 hover:bg-green-700 rounded-lg text-white inline"> Edit </a>
                                    <form class="px-3 py-3 bg-red-500 hover:bg-red-700 rounded-lg text-white inline " method="POST"
                                        action="{{ route('admin.reservations.destroy', $reservation->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>

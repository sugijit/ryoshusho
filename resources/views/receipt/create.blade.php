<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Receipt') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('receipts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="branch" class="block text-gray-700 text-sm font-bold mb-2">Branch:</label>
                            <input type="text" name="branch" id="branch" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="section_staff" class="block text-gray-700 text-sm font-bold mb-2">Section Staff:</label>
                            <input type="text" name="section_staff" id="section_staff" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Code:</label>
                            <input type="text" name="code" id="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="client_address" class="block text-gray-700 text-sm font-bold mb-2">Client Address:</label>
                            <input type="text" name="client_address" id="client_address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="issued_at" class="block text-gray-700 text-sm font-bold mb-2">Issued At:</label>
                            <input type="date" name="issued_at" id="issued_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="client_company_name" class="block text-gray-700 text-sm font-bold mb-2">Client Company Name:</label>
                            <input type="text" name="client_company_name" id="client_company_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="face_value" class="block text-gray-700 text-sm font-bold mb-2">Face Value:</label>
                            <input type="number" name="face_value" id="face_value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="cash_value" class="block text-gray-700 text-sm font-bold mb-2">Cash Value:</label>
                            <input type="number" name="cash_value" id="cash_value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="cheque_value" class="block text-gray-700 text-sm font-bold mb-2">Cheque Value:</label>
                            <input type="number" name="cheque_value" id="cheque_value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <!-- Add more fields as needed -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Receipt</button>
                            <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
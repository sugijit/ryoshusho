<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt Details') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Receipt Code: {{ $receipt->code }}</h3>
                    </div>
                    <div class="mb-4">
                        <p><strong>Client:</strong> {{ $receipt->client_company_name }}</p>
                        <p><strong>Value:</strong> {{ $receipt->receipt_value }}</p>
                        <!-- Add more receipt details here -->
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('receipts.edit', $receipt) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                        <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
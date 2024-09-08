<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Receipt') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <form action="{{ route('receipts.update', $receipt) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="code" class="block text-gray-700 text-sm font-bold mb-2">Code:</label>
                            <input type="text" name="code" id="code" value="{{ $receipt->code }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="client_address" class="block text-gray-700 text-sm font-bold mb-2">Client:</label>
                            <input type="text" name="client_address" id="client_address" value="{{ $receipt->client_address }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="receipt_value" class="block text-gray-700 text-sm font-bold mb-2">Value:</label>
                            <input type="text" name="receipt_value" id="receipt_value" value="{{ $receipt->receipt_value }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Receipt</button>
                            <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                        </div>
                    </form> --}}





                    <form action="{{ route('receipts.update', $receipt) }}" method="POST" >
                        <div class="flex flex-wrap justify-between gap-4">
                            @csrf
                            @method('PUT')
                            <div class="w-full smw-[calc(50%-1rem)]2 md:w-[calc(20%-1rem)]">
                                <div class="mb-4">
                                    <label for="branch" class="block text-gray-700 text-sm font-bold mb-2">営業所:</label>
                                    <input type="text" name="branch" id="branch" value="{{ $receipt->branch }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="section_staff" class="block text-gray-700 text-sm font-bold mb-2">課員:</label>
                                    <input type="text" name="section_staff" id="section_staff" value="{{ $receipt->section_staff }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="code" class="block text-gray-700 text-sm font-bold mb-2">コード:</label>
                                    <input type="text" name="code" id="code" value="{{ $receipt->code }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="client_address" class="block text-gray-700 text-sm font-bold mb-2">宛先:</label>
                                    <input type="text" name="client_address" id="client_address" value="{{ $receipt->client_address }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <div class="mb-4">
                                    <label for="issued_at" class="block text-gray-700 text-sm font-bold mb-2">発行日:</label>
                                    <input type="date" name="issued_at" id="issued_at" value="{{ $receipt->issued_at }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                            <div class="w-full sm:w-[calc(50%-1rem)]  md:w-[calc(20%-1rem)]">
                                <div class="mb-4">
                                    <label for="face_value" class="block text-gray-700 text-sm font-bold mb-2">額面:</label>
                                    <input type="number" name="face_value" id="face_value" value="{{ $receipt->face_value }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="note" class="block text-gray-700 text-sm font-bold mb-2">領収書備考:</label>
                                    <input type="text" name="note" id="note" value="{{ $receipt->note }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="receipt_value" class="block text-gray-700 text-sm font-bold mb-2">請求額:</label>
                                    <input type="number" name="receipt_value" id="receipt_value" value="{{ $receipt->receipt_value }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="cash_value" class="block text-gray-700 text-sm font-bold mb-2">現金:</label>
                                    <input type="number" name="cash_value" id="cash_value" value="{{ $receipt->cash_value }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="cheque_value" class="block text-gray-700 text-sm font-bold mb-2">小切手:</label>
                                    <input type="number" name="cheque_value" id="cheque_value" value="{{ $receipt->cheque_value }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                            <div class="w-full sm:w-[calc(50%-1rem)]  md:w-[calc(20%-1rem)]">
                                <div class="mb-4">
                                    <label for="promissory_value1" class="block text-gray-700 text-sm font-bold mb-2">手形①:</label>
                                    <input type="number" name="promissory_value1" id="promissory_value1" value="{{ $receipt->promissory_value1 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="promissory1_date" class="block text-gray-700 text-sm font-bold mb-2">期日①:</label>
                                    <input type="date" name="promissory1_date" id="promissory1_date" value="{{ $receipt->promissory1_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="promissory_issuer1" class="block text-gray-700 text-sm font-bold mb-2">振出人①:</label>
                                    <input type="text" name="promissory_issuer1" id="promissory_issuer1" value="{{ $receipt->promissory_issuer1 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                            <div class="w-full sm:w-[calc(50%-1rem)]  md:w-[calc(20%-1rem)]">
                                <div class="mb-4">
                                    <label for="promissory_value2" class="block text-gray-700 text-sm font-bold mb-2">手形②:</label>
                                    <input type="number" name="promissory_value2" id="promissory_value2" value="{{ $receipt->promissory_value2 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="promissory2_date" class="block text-gray-700 text-sm font-bold mb-2">期日②:</label>
                                    <input type="date" name="promissory2_date" id="promissory2_date" value="{{ $receipt->promissory2_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="promissory_issuer2" class="block text-gray-700 text-sm font-bold mb-2">振出人②:</label>
                                    <input type="text" name="promissory_issuer2" id="promissory_issuer2" value="{{ $receipt->promissory_issuer2 }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>
                            <div class="w-full sm:w-[calc(50%-1rem)]  md:w-[calc(20%-1rem)]">
                                <div class="mb-4">
                                    <label for="offset" class="block text-gray-700 text-sm font-bold mb-2">相殺:</label>
                                    <input type="number" name="offset" id="offset" value="{{ $receipt->offset }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="discount" class="block text-gray-700 text-sm font-bold mb-2">値引:</label>
                                    <input type="number" name="discount" id="discount" value="{{ $receipt->discount }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="other" class="block text-gray-700 text-sm font-bold mb-2">その他:</label>
                                    <input type="number" name="other" id="other" value="{{ $receipt->other }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4 hidden">
                                    <label for="client_company_name" class="block text-gray-700 text-sm font-bold mb-2">会社名（これは隠す）</label>
                                    <input type="client_company_name" name="client_company_name" id="client_company_name" value="null" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">null
                                </div>
                            </div>
                        </div>
                        <!-- Add more fields as needed -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">更新する</button>
                            <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
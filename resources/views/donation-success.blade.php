<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - SSC-2013 Batch</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body
    class="bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full">
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12">
            <!-- Success Icon -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Thank You!</h1>
                <p class="text-gray-600 text-lg">Your donation has been submitted successfully</p>
                <div class="mt-4">
                    <p class="text-sm text-gray-500">Your Reference ID</p>
                    <div class="flex items-center justify-center gap-2 mt-1">
                        <p id="refId" class="text-2xl font-mono font-bold text-primary-600">
                            #{{ str_pad($donation->id, 6, '0', STR_PAD_LEFT) }}</p>
                        <button type="button" onclick="copyRefId()" id="copyBtn"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 hover:bg-primary-100 text-gray-500 hover:text-primary-600 transition-colors cursor-pointer"
                            title="Copy Reference ID">
                            <svg id="copyIcon" class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                </path>
                            </svg>
                            <svg id="checkIcon" class="w-4 h-4 hidden text-green-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Phone: <span
                            class="font-semibold text-gray-700">{{ $donation->phone }}</span></p>
                    <p class="text-xs text-gray-400 mt-1">Please save this for your records</p>
                </div>
            </div>

            <!-- Donation Summary -->
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Donation Summary</h2>

                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-gray-600">Name</span>
                        <span class="font-semibold text-gray-800">{{ $donation->name }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-gray-600">Donation Type</span>
                        <span class="font-semibold text-primary-600">{{ $donation->donation_type_label }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-gray-600">Amount</span>
                        <span class="font-bold text-green-600 text-xl">৳{{ number_format($donation->amount, 2) }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-gray-600">Transaction ID</span>
                        <span class="font-mono text-gray-800">{{ $donation->transaction_id }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-gray-600">Sent From</span>
                        <span class="font-mono text-gray-800">{{ $donation->sent_from }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Sent To</span>
                        <span class="font-mono text-gray-800">{{ $donation->sentToPhone?->number ?? 'N/A' }}
                            ({{ $donation->sentToPhone?->operator ?? 'N/A' }})</span>
                    </div>
                </div>
            </div>

            <!-- Jersey Details -->
            @if ($donation->jerseyDetail)
                <div class="bg-blue-50 rounded-xl p-6 mb-8 border border-blue-100">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        Jersey Details
                    </h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-blue-600">Size</p>
                            <p class="font-semibold text-blue-900">{{ $donation->jerseyDetail->size?->size ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600">Name on Jersey</p>
                            <p class="font-semibold text-blue-900">{{ $donation->jerseyDetail->name_on_jersey }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm text-blue-600">Number on Jersey</p>
                            <p class="font-semibold text-blue-900">{{ $donation->jerseyDetail->number_on_jersey }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Status Message -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-yellow-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-sm text-yellow-800 font-medium">Payment Verification Pending</p>
                        <p class="text-sm text-yellow-700 mt-1">
                            Your donation is being verified. We'll confirm once the payment is received.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('home') }}" class="btn-primary text-center flex-1">
                    Back to Home
                </a>
                <a href="tel:01000000000" class="btn-gold text-center flex-1 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    Contact Us
                </a>
            </div>


        </div>
    </div>

    <script>
        function copyRefId() {
            const refId = document.getElementById('refId').textContent.trim();
            navigator.clipboard.writeText(refId).then(() => {
                document.getElementById('copyIcon').classList.add('hidden');
                document.getElementById('checkIcon').classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById('copyIcon').classList.remove('hidden');
                    document.getElementById('checkIcon').classList.add('hidden');
                }, 2000);
            });
        }
    </script>
</body>

</html>

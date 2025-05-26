<x-app-layout>
    <div class="min-h-screen py-6" style="background-color: #F3F1ED;">
        <div class="max-w-md mx-auto">
            <!-- Balance Card -->
            <div class="rounded-2xl shadow bg-yellow-200 px-6 py-4 mt-6 mb-6">
                <div class="font-bold text-blue-900 text-lg mb-1">Balance</div>
                <div class="text-3xl font-bold text-gray-800 mb-1">Ksh: <span>00.00</span></div>
                <div class="text-gray-700 text-sm">Main account balance</div>
            </div>

            <!-- Actions -->
            <div class="rounded-2xl shadow bg-white px-4 py-4 flex flex-col items-center mb-6">
                <div class="flex w-full justify-between gap-2 mb-2">
                    <!-- History -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="bg-yellow-200 rounded-xl w-14 h-14 flex items-center justify-center mb-1">
                            <!-- History Icon -->
                            <div class="flex flex-col items-center flex-1">
                                <div class="bg-yellow-200 rounded-xl w-5 h-5 flex items-center justify-center mb-1">
                                    <img src="{{ asset('drawable/dollar.png') }}" alt="Deposit" class="w-7 h-7" />
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-gray-700">Deposit</span>
                    </div>
                    <!-- Deposit -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="bg-yellow-200 rounded-xl w-14 h-14 flex items-center justify-center mb-1">
                            <!-- Deposit Icon -->
                            <div class="flex flex-col items-center flex-1">
                                <div class="bg-yellow-200 rounded-xl w-5 h-5 flex items-center justify-center mb-1">
                                    <img src="{{ asset('drawable/wallet.png') }}" alt="Deposit" class="w-7 h-7" />
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-gray-700">Transact</span>
                    </div>
                    <!-- Withdraw -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="bg-yellow-200 rounded-xl w-14 h-14 flex items-center justify-center mb-1">
                            <!-- Withdraw Icon -->
                            <div class="flex flex-col items-center flex-1">
                                <div class="bg-yellow-200 rounded-xl w-5 h-5 flex items-center justify-center mb-1">
                                    <img src="{{ asset('drawable/transaction.png') }}" alt="Withdraw" class="w-7 h-7" />
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-gray-700">Withdraw</span>
                    </div>
                    <!-- Reports -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="bg-yellow-200 rounded-xl w-14 h-14 flex items-center justify-center mb-1">
                            <!-- Reports Icon -->
                            <div class="flex flex-col items-center flex-1">
                                <div class="bg-yellow-200 rounded-xl w-5 h-5 flex items-center justify-center mb-1">
                                    <img src="{{ asset('drawable/report.png') }}" alt="Reports" class="w-7 h-7" />
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-gray-700">Reports</span>
                    </div>
                </div>
            </div>

            <!-- Transactions Title -->
            <div class="text-black-400 font-semibold text-lg px-2 mt-4">Transactions</div>
        </div>
    </div>
</x-app-layout>
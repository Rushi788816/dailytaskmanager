<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold">
        Add New Campaign
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl w-full max-w-2xl p-6" @click.away="open = false">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Add New Campaign</h3>

            <!-- Form -->
            <form method="POST" action="{{ route('campaigns.store') }}">
                @csrf

                <!-- Campaign Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Campaign Name</label>
                    <input type="text" name="name" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Keyword -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keyword</label>
                    <input type="text" name="keyword" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Region -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Region</label>
                    <input type="text" name="region" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Total Contacts -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Contacts</label>
                    <input type="number" name="total_contacts" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Shoot Email ID -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Shoot Email ID</label>
                    <input type="email" name="shoot_email_id" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Schedule Date -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Schedule Date</label>
                    <input type="date" name="schedule_date" required class="mt-1 w-full px-3 py-2 border rounded-md dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Footer Buttons -->
                <div class="flex justify-end space-x-2 mt-6">
                    <!-- Cancel Button -->
                    <button
                        type="button"
                        @click="open = false"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400"
                    >
                        Cancel
                    </button>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                    >
                        Save Campaign
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

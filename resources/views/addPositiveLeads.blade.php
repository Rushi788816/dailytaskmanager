<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold">
        Add New Lead
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl w-full max-w-2xl p-6" @click.away="open = false">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Add New Lead</h3>

            <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="campaign_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Campaign Name</label>
                    <input type="text" name="campaign_name" id="campaign_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-800 dark:text-white">
                </div>

                <div>
                    <label for="client_email_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Client Email</label>
                    <input type="email" name="client_email_id" id="client_email_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-800 dark:text-white">
                </div>

                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keyword</label>
                    <input type="text" name="keyword" id="keyword" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-800 dark:text-white">
                </div>

                <div>
                    <label for="lead_generated_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lead Date</label>
                    <input type="date" name="lead_generated_date" id="lead_generated_date" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-800 dark:text-white">
                </div>

                <!-- Footer -->
                <div class="flex justify-end space-x-2 mt-4">
                    <!-- Cancel Button -->
                    <button
                        type="button"
                        @click="open = false"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Cancel
                    </button>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save Lead
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
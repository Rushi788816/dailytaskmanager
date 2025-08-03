<x-app-layout>
    <div x-data="{ showLeadForm: false, showCampaignForm: false }" @close-lead-form.window="showLeadForm = false" @close-campaign-form.window="showCampaignForm = false">

        {{-- Header --}}
        <x-slot name="header">
            <!-- Dashboard Title -->
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            <!-- Side-by-side Forms Row -->
            <div class="flex flex-wrap gap-6">
                <!-- Campaign Form (Left Side) -->
                <div x-show="showCampaignForm" x-transition class="w-full md:w-1/2">
                    @include('addCampaignForm')
                </div>

                <!-- Lead Form (Right Side) -->
                <div x-show="showLeadForm" x-transition class="w-full md:w-1/2">
                    @include('addPositiveLeads')
                </div>
            </div>
        </x-slot>




        {{-- Main Content --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- Flash Message --}}
                @if(session('status'))
                <div x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded shadow-lg z-50">
                    {{ session('status') }}
                </div>
                @endif

                {{-- Statistic Cards --}}
                <div class="flex space-x-6 overflow-x-auto pb-4 mb-8">
                    <div class="min-w-[220px] bg-blue-500 shadow-lg rounded-lg p-6 text-center text-white transform hover:scale-105 transition animate-card">
                        <div class="text-lg font-semibold mb-2">Total Leads</div>
                        <div class="text-4xl font-extrabold">{{ $totalLeads }}</div>
                    </div>
                    <div class="min-w-[220px] bg-green-500 shadow-lg rounded-lg p-6 text-center text-white transform hover:scale-105 transition animate-card" style="animation-delay: 0.12s;">
                        <div class="text-lg font-semibold mb-2">Total Mail Shoot</div>
                        <div class="text-4xl font-extrabold">{{ $totalMailShoot }}</div>
                    </div>
                    <div class="min-w-[220px] bg-orange-500 shadow-lg rounded-lg p-6 text-center text-white transform hover:scale-105 transition animate-card" style="animation-delay: 0.24s;">
                        <div class="text-lg font-semibold mb-2">Total Keywords Done</div>
                        <div class="text-4xl font-extrabold">{{ $totalKeywordsDone }}</div>
                    </div>
                </div>

                {{-- Campaigns Table --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="overflow-x-auto rounded shadow">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Name</th>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Keyword</th>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Region</th>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Contacts</th>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Email ID</th>
                                    <th class="px-6 py-3 text-left font-bold text-gray-700 dark:text-gray-200">Schedule</th>
                                    <th class="px-6 py-3 text-center font-bold text-gray-700 dark:text-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($campaigns as $campaign)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $campaign->name }}</td>
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $campaign->keyword }}</td>
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $campaign->region }}</td>
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $campaign->total_contacts }}</td>
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $campaign->shoot_email_id }}</td>
                                    <td class="px-6 py-3 text-gray-900 dark:text-gray-100">
                                        {{ \Carbon\Carbon::parse($campaign->schedule_date)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-3 flex justify-center gap-3">
                                        <a href="{{ route('campaigns.edit', $campaign) }}" class="text-blue-600 hover:underline font-semibold">Edit</a>
                                        <form method="POST" action="{{ route('campaigns.destroy', $campaign) }}" onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline font-semibold">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No campaigns found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Animation Style --}}
    <style>
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.92);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-card {
            animation: cardEntrance 0.6s cubic-bezier(.4, 2, .5, 1) both;
        }
    </style>
</x-app-layout>
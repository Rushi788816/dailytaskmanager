@extends('layouts.app') <!-- Use layout that supports @section('content') -->

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Edit Campaign</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Include the same form you used for creating --}}
        @include('campainForm', ['campaign' => $campaign])

        <div class="flex gap-4 mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update Campaign
            </button>
            <a href="{{ route('campaigns.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($campaign) ? 'Edit Campaign' : 'Create Campaign' }}</h2>

    <form action="{{ isset($campaign) ? route('campaigns.update', $campaign->id) : route('campaigns.store') }}" method="POST">
        @csrf
        @if(isset($campaign))
            @method('PUT')
        @endif

        <div>
            <label>Campaign Name</label>
            <input type="text" name="name" value="{{ old('name', $campaign->name ?? '') }}" required>
        </div>

        <div>
            <label>Keyword</label>
            <input type="text" name="keyword" value="{{ old('keyword', $campaign->keyword ?? '') }}" required>
        </div>

        <div>
            <label>Region</label>
            <input type="text" name="region" value="{{ old('region', $campaign->region ?? '') }}" required>
        </div>

        <div>
            <label>Total Contacts</label>
            <input type="number" name="total_contacts" value="{{ old('total_contacts', $campaign->total_contacts ?? '') }}" required>
        </div>

        <div>
            <label>Shoot Email ID</label>
            <input type="email" name="shoot_email_id" value="{{ old('shoot_email_id', $campaign->shoot_email_id ?? '') }}" required>
        </div>

        <div>
            <label>Schedule Date</label>
            <input type="date" name="schedule_date" value="{{ old('schedule_date', isset($campaign) ? \Carbon\Carbon::parse($campaign->schedule_date)->format('Y-m-d') : '') }}" required>
        </div>

        <div style="margin-top: 10px;">
            <button type="submit" class="btn btn-primary">
                {{ isset($campaign) ? 'Update' : 'Create' }} Campaign
            </button>
            <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Balkis Premium Group')

@php
    $homePage = \App\Models\HomePage::getCurrent();
    $services = $homePage->activeServices;
@endphp

@section('content')
    @include('components.hero-section', ['homePage' => $homePage, 'services' => $services])
@endsection

@section('showStatsBar')
    @include('components.stats-bar')
@endsection

@push('scripts')
<script>
    // Simple script to handle RTL specific logic if needed
    // Icons that indicate direction need flipping in RTL.
    const arrowIcons = document.querySelectorAll('.flip-rtl');
    arrowIcons.forEach(icon => {
        icon.style.transform = 'scaleX(-1)';
    });
</script>
@endpush

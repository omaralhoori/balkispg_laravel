@extends('layouts.app')

@section('title', 'Balkis Premium Group')

@php
    $homePage = \App\Models\HomePage::getCurrent();
    $services = $homePage->activeServices;
@endphp

@section('content')
    @include('components.hero-section', ['homePage' => $homePage, 'services' => $services])
    @include('components.statistics-section', ['homePage' => $homePage])
    @include('components.testimonials-section')
    @include('components.contact-section', ['homePage' => $homePage])
@endsection

@section('showStatsBar')
    @include('components.stats-bar')
@endsection

@push('scripts')
<script>
    // Ensure page starts at the top (Hero section) on load
    if (window.history.scrollRestoration) {
        window.history.scrollRestoration = 'manual';
    }
    
    // Scroll to top on page load
    window.addEventListener('load', function() {
        window.scrollTo(0, 0);
    });
    
    // Also scroll to top immediately if page is already loaded
    if (document.readyState === 'complete') {
        window.scrollTo(0, 0);
    } else {
        document.addEventListener('DOMContentLoaded', function() {
            window.scrollTo(0, 0);
        });
    }
    
    // Simple script to handle RTL specific logic if needed
    // Icons that indicate direction need flipping in RTL.
    const arrowIcons = document.querySelectorAll('.flip-rtl');
    arrowIcons.forEach(icon => {
        icon.style.transform = 'scaleX(-1)';
    });
</script>
@endpush

@extends(layout())

{{-- Template Settings --}}
@section('page-id', 'projects')
@section('main-class', 'd-flex align-items-stretch')

{{-- Status Options --}}
@php
    $status = [
        'pending'     => 'Pending',
        'planning'    => 'Planning',
        'canceled'    => 'Canceled',
        'complete'    => 'Complete',
        'ongoing'     => 'Ongoing',
        'on-hold'     => 'On Hold',
        'blocked'     => 'Blocked'
    ];
@endphp


{{-- Template Content --}}
@section('banner')
<div class="page-heading">
    <h1 class="text-center">Projects</h1>
    <span class="text-hr">プロジェクト</span>
    <div class="d-flex align-items-center justify-content-center">
        @include('partials.navigation.breadcrumbs')
    </div>
</div>
@endsection

@section('content')
    <ul class="project-list container py-4">
        @foreach ($entries as $item)
        <li class="project-list__item">
            <a class="project-list__link" href="{{ url($item->uri) }}" title="View Project: {{$item->name }}">
                <div class="project-list__heading d-flex align-items-center justify-content-between">
                    <h2 class="text-display--xxs mb-0">{{$item->name }}</h2>
                    <span class="status-badge status-badge--{{ $item->project_status }}">{{ $status[$item->project_status] }}</span>
                </div>
                
                @if ($item->subtitle)<p class="mb-0">{{ $item->subtitle }}</p>@endif
            </a>
        </li>
        @endforeach
    </ul>
@endsection
```html
@extends('layouts.admin')

@section('main-content')

<!-- Main Layout -->
<div class="bg-base-100">
    <!-- Breadcrumbs -->
    <div class="mb-6">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li> 
                <li><a href="{{ route('admin.tutor-applications') }}">Prijave za instruktore</a></li>
                <li>Prijava #{{ $application->id }}</li>
            </ul>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h1 class="text-3xl font-bold mt-2">Prijava za instruktora #{{ $application->id }}</h1>
            
            <div class="flex gap-2">
                @if($application->status == 'pending')
                    <form action="{{ route('admin.tutor-applications.approve', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Odobri</button>
                    </form>
                    
                    <form action="{{ route('admin.tutor-applications.reject', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-error btn-sm">Odbij</button>
                    </form>
                @endif
                
                <a href="{{ route('admin.tutor-applications') }}" class="btn btn-outline btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Nazad
                </a>
            </div>
        </div>
    </div>

    <!-- Application Status Timeline -->
    <div class="timeline-container relative mt-8 mb-8">
        <!-- Progress Bar -->
        <div class="relative h-1 bg-base-100 rounded-full mb-8">
            <div class="absolute inset-0 h-full bg-primary rounded-full transition-all duration-500 ease-out"
                 style="width: {{ $application->status === 'approved' ? '100%' : ($application->status === 'rejected' ? '66%' : '33%') }}">
            </div>
        </div>

        <!-- Timeline Steps -->
        <div class="flex justify-between relative -mt-14 mb-14">
            
            <!-- Step 1: Application Submitted -->
            <div class="flex flex-col items-center w-1/3">
                <div class="relative z-10">
                    <!-- Circle -->
                    <div class="w-6 h-6 rounded-full bg-primary border-4 border-base-100 mb-3">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Text -->
                <div class="text-center">
                    <div class="text-sm text-primary font-medium mb-1">
                        {{ $application->created_at->format('d.m.Y H:i') }}
                    </div>
                    <div class="text-sm font-medium">
                        Prijava poslana
                    </div>
                </div>
            </div>

            <!-- Step 2: Document Review -->
            <div class="flex flex-col items-center w-1/3">
                <div class="relative z-10 mb-3">
                    <!-- Circle -->
                    @if($application->status !== 'pending')
                        <div class="w-6 h-6 rounded-full bg-primary border-4 border-base-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    @else
                        <div class="w-6 h-6 rounded-full border-4 border-primary">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Text -->
                <div class="text-center">
                    <div class="text-sm {{ $application->status !== 'pending' ? 'text-primary' : 'text-base-content' }} font-medium mb-1">
                        @if($application->status !== 'pending')
                            {{ $application->updated_at->format('d.m.Y H:i') }}
                        @else
                            &nbsp;
                        @endif
                    </div>
                    <div class="text-sm font-medium">
                        Pregled dokumentacije
                    </div>
                    @if($application->status === 'pending')
                        <div class="text-xs text-primary mt-1">
                            U obradi...
                        </div>
                    @endif
                </div>
            </div>

            <!-- Step 3: Account Activated (Only if approved) -->
            @if($application->status === 'approved')
            <div class="flex flex-col items-center w-1/3">
                <div class="relative z-10 mb-3">
                    <!-- Circle -->
                    <div class="w-6 h-6 rounded-full bg-primary border-4 border-base-100">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Text -->
                <div class="text-center">
                    <div class="text-sm text-primary font-medium mb-1">
                        &nbsp;
                    </div>
                    <div class="text-sm font-medium">
                        Račun aktiviran
                    </div>
                    <div class="text-xs text-success mt-1">
                        Može početi poučavati
                    </div>
                </div>
            </div>
            @else
            <!-- Step 3: Placeholder or Rejected -->
            <div class="flex flex-col items-center w-1/3">
                <div class="relative z-10 mb-3">
                    <!-- Empty Circle or Red X for Rejected -->
                    @if($application->status === 'rejected')
                        <div class="w-6 h-6 rounded-full bg-error border-4 border-base-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    @else
                        <div class="w-6 h-6 rounded-full border-4 border-base-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-base-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Text -->
                <div class="text-center">
                    <div class="text-sm text-base-content/50 font-medium mb-1">
                        @if($application->status === 'rejected')
                            {{ $application->updated_at->format('d.m.Y H:i') }}
                        @else
                            &nbsp;
                        @endif
                    </div>
                    <div class="text-sm font-medium {{ $application->status === 'rejected' ? 'text-error' : 'text-base-content/50' }}">
                        {{ $application->status === 'rejected' ? 'Prijava odbijena' : 'Račun aktiviran' }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Application Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left column: User Info & Experience -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Combined User Profile & Experience Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <!-- User Profile Section -->
                    <div class="flex items-center gap-6 mb-6">
                        <div class="avatar">
                            <div class="w-20 h-20 rounded-full">
                                @if($application->user->profile_photo_url)
                                    <img src="{{ $application->user->profile_photo_url }}" alt="{{ $application->user->first_name }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div class="avatar placeholder">
                                        <div class="bg-primary text-primary-content rounded-full w-20 h-20">
                                            <span class="text-3xl font-bold">
                                                {{ strtoupper(substr($application->user->first_name, 0, 1)) }}{{ strtoupper(substr($application->user->last_name, 0, 1)) }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold">{{ $application->user->first_name }} {{ $application->user->last_name }}</h3>
                            <p class="text-base-content/70">{{ $application->user->email }}</p>
                            <p class="text-base-content/70">{{ $application->phone ?? 'Telefon nije naveden' }}</p>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <!-- Experience Section -->
                    <h4 class="text-lg font-semibold mb-4">Iskustvo</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-base-200 p-4 rounded-lg">
                            <div class="text-sm text-base-content/70">Godine iskustva</div>
                            <div class="text-lg font-medium">{{ $application->experience_years }}</div>
                        </div>
                        <div class="bg-base-200 p-4 rounded-lg">
                            <div class="text-sm text-base-content/70">Online poučavanje</div>
                            <div class="text-lg font-medium">
                                @if($application->online_experience)
                                    <span class="text-success">Da</span>
                                @else
                                    <span class="text-base-content/70">Ne</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Experience Description -->
                    <div class="mt-4 bg-base-200 p-4 rounded-lg">
                        <h5 class="text-sm font-semibold mb-2">Opis iskustva</h5>
                        <p class="text-sm">{{ $application->experience_description }}</p>
                    </div>
                    
                    <!-- Biography -->
                    <div class="mt-4 bg-base-200 p-4 rounded-lg">
                        <h5 class="text-sm font-semibold mb-2">Biografija</h5>
                        <p class="text-sm">{{ $application->biography }}</p>
                    </div>
                </div>
            </div>

            <!-- Education History -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Obrazovanje</h3>
                    
                    @foreach($application->education as $education)
                        <div class="flex gap-4 mb-4 last:mb-0">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium">{{ $education->institution }}</h4>
                                <p class="text-sm text-base-content/70">
                                    {{ getDegreeLabel($education->degree) }} - {{ $education->field }}
                                </p>
                                <p class="text-xs text-base-content/60 mt-1">
                                    {{ $education->start_date ? \Carbon\Carbon::parse($education->start_date)->format('d.m.Y') : '' }} 
                                    - 
                                    {{ $education->current ? 'Trenutno' : ($education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('d.m.Y') : '') }}
                                </p>
                            </div>
                        </div>
                        
                        @if(!$loop->last)
                            <div class="divider my-2"></div>
                        @endif
                    @endforeach
                    
                    @if(count($application->education) == 0)
                        <p class="text-sm text-base-content/70">Nema dodatnih obrazovnih informacija.</p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Right column: Documents and Actions -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Documents Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Dokumenti</h3>
                    
                    <div class="space-y-3">
                        <!-- CV Document -->
                        <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium">CV</h4>
                                    <p class="text-xs text-base-content/70">PDF dokument</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $application->cv) }}" target="_blank" class="btn btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Preuzmi
                            </a>
                        </div>
                        
                        <!-- Diploma Document -->
                        <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium">Diploma</h4>
                                    <p class="text-xs text-base-content/70">Slika</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $application->diploma) }}" target="_blank" class="btn btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Preuzmi
                            </a>
                        </div>
                        
                        <!-- ID Card Document -->
                        <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium">Osobna iskaznica</h4>
                                    <p class="text-xs text-base-content/70">Slika</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $application->id_card) }}" target="_blank" class="btn btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Preuzmi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status & Notes Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Status i napomene</h3>
                    
                    <div class="mb-4">
                        <div class="text-sm text-base-content/70 mb-1">Status prijave</div>
                        @if($application->status == 'pending')
                            <div class="badge badge-warning gap-1">
                                <span class="loading loading-spinner loading-xs"></span>
                                Na čekanju
                            </div>
                        @elseif($application->status == 'approved')
                            <div class="badge badge-success">Odobreno</div>
                        @elseif($application->status == 'rejected')
                            <div class="badge badge-error">Odbijeno</div>
                        @endif
                    </div>

                    @if($application->reviewer_id)
                        <div class="mb-4">
                            <div class="text-sm text-base-content/70 mb-1">Odluku donio</div>
                            <div>{{ getUserName($application->reviewer_id) }}</div>
                        </div>
                    @endif

                    @if($application->reviewed_at)
                        <div class="mb-4">
                            <div class="text-sm text-base-content/70 mb-1">Datum odluke</div>
                            <div>{{ \Carbon\Carbon::parse($application->reviewed_at)->format('d.m.Y H:i') }}</div>
                        </div>
                    @endif

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Napomena (samo za administratore)</span>
                        </label>
                        <form action="{{ route('admin.tutor-applications.update-notes', $application->id) }}" method="POST">
                            @csrf
                            <textarea name="notes" class="textarea textarea-bordered h-24" placeholder="Dodaj napomenu...">{{ $application->notes ?? '' }}</textarea>
                            <button type="submit" class="btn btn-sm btn-primary mt-2">Spremi napomenu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
function getDegreeLabel($value) {
    $degrees = [
        'srednja' => 'Srednja škola',
        'vss' => 'Viša stručna sprema',
        'vss_mag' => 'Magisterij',
        'doktorat' => 'Doktorat'
    ];
    return $degrees[$value] ?? $value;
}

function getUserName($userId) {
    // This should fetch the user name from database
    // For now, return a placeholder
    return "Administrator";
}
@endphp

@endsection
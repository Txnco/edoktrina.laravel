@extends('layouts.app')

@section('main-content')
<div class="bg-base-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Status Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Status Vaše prijave za instruktora</h1>
            <p class="text-base-content/70">Pratite status svoje prijave i saznajte više o sljedećim koracima</p>
        </div>

        <!-- Application Status Card -->
        <div class="card shadow-xl bg-base-100 mb-8">
            <div class="card-body">
                <!-- Status Badge -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="card-title text-2xl">Pregled prijave</h2>
                    <div class="badge badge-lg 
                        {{ $application->status === 'pending' ? 'badge-warning' : '' }}
                        {{ $application->status === 'approved' ? 'badge-success' : '' }}
                        {{ $application->status === 'rejected' ? 'badge-error' : '' }}
                    ">
                        @switch($application->status)
                            @case('pending')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                U obradi
                                @break
                            @case('approved')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Odobreno
                                @break
                            @case('rejected')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Odbijeno
                                @break
                        @endswitch
                    </div>
                </div>

             
                <!-- Application Status Timeline -->
                <div class="timeline-container relative mt-8">
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
                                    Možete početi poučavati
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- Step 3: Placeholder -->
                        <div class="flex flex-col items-center w-1/3">
                            <div class="relative z-10 mb-3">
                                <!-- Empty Circle -->
                                <div class="w-6 h-6 rounded-full border-4 border-base-100">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-base-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Text -->
                            <div class="text-center">
                                <div class="text-sm text-base-content/50 font-medium mb-1">
                                    &nbsp;
                                </div>
                                <div class="text-sm font-medium text-base-content/50">
                                    Račun aktiviran
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                
            
                
                <!-- Admin Review Message -->
                @if($application->reviewer_message)
                    <div class="mt-8 p-6 rounded-lg {{ $application->status === 'approved' ? 'bg-success/10' : 'bg-error/10' }}">
                        <h3 class="font-bold mb-2">Poruka od tima:</h3>
                        <p class="whitespace-pre-wrap">{{ $application->reviewer_message }}</p>
                    </div>
                @endif

                @if($application->status === 'pending')
                    <div class="mt-8 p-6 bg-info/10 rounded-lg">
                        <h3 class="font-bold mb-2">Što se sada događa?</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>Naš tim će pregledati vašu dokumentaciju</li>
                            <li>Možete očekivati odgovor u roku od 2-3 radna dana</li>
                            <li>Kontaktirat ćemo vas putem emaila s dodatnim informacijama</li>
                        </ul>
                    </div>
                @endif

                @if($application->status === 'approved')
                    <div class="mt-8 flex gap-4">
                        <a href="" class="btn btn-primary">
                            Instruktorska ploča
                        </a>
                        <a href="{{ route('user.profile', $user->username) }}" class="btn btn-outline">
                            Moj profil
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Application Details -->
        <div class="grid grid-cols-1  gap-6">
           
            <!-- Combined User Profile & Experience Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <!-- User Profile Section -->
                    <div class="flex items-center gap-6 mb-6">
                        <div class="avatar">
                            <div class="w-20 h-20 rounded-full">
                                @if($user->profile_photo_url)
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->first_name }}" class="w-full h-full object-cover rounded-full">
                                @else
                                    <div class="avatar placeholder">
                                        <div class="bg-primary text-primary-content rounded-full w-20 h-20">
                                            <span class="text-3xl font-bold">
                                                {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p class="text-base-content/70">{{ $user->email }}</p>
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
                    
                    <!-- Experience Description (Collapsible) -->
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="checkbox" /> 
                        <div class="collapse-title text-sm font-medium">
                            Prikaz opisa iskustva
                        </div>
                        <div class="collapse-content"> 
                            <p class="text-sm text-base-content/80">{{ $application->experience_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        <!-- Education Information -->
        <div class="card bg-base-100 shadow-xl mt-6">
            <div class="card-body">
                <h3 class="card-title">Obrazovanje</h3>
                <div class="space-y-4 mt-4">
                    @foreach($application->education as $edu)
                        <div class="p-4 bg-base-200 rounded-lg">
                            <h4 class="font-bold">{{ $edu->institution }}</h4>
                            <p>Područje: {{ $edu->field }}</p>
                            <p>Stupanj: </p>
                            <p>Razdoblje: {{ $edu->start_date->format('Y') }} - 
                                {{ $edu->current ? 'Trenutno' : $edu->end_date->format('Y') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Documents -->
        <div class="card bg-base-100 shadow-xl mt-6">
            <div class="card-body">
                <h3 class="card-title">Poslana dokumentacija</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="card bg-base-200 border border-base-300 p-4 hover:shadow">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-medium">CV</p>
                                <p class="text-sm text-base-content/60">Životopis</p>
                            </div>
                            <a href="{{ route('tutor.download-document', [$application->id, 'cv']) }}" class="btn btn-circle btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card bg-base-200 border border-base-300 p-4 hover:shadow">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-medium">Diploma</p>
                                <p class="text-sm text-base-content/60">Certifikat</p>
                            </div>
                            <a href="{{ route('tutor.download-document', [$application->id, 'diploma']) }}" class="btn btn-circle btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card bg-base-200 border border-base-300 p-4 hover:shadow">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-medium">Osobna iskaznica</p>
                                <p class="text-sm text-base-content/60">Identifikacija</p>
                            </div>
                            <a href="{{ route('tutor.download-document', [$application->id, 'id_card']) }}" class="btn btn-circle btn-sm btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @if($application->status === 'pending')
                    <div class="mt-6 alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Vaše dokumente trenutno pregledava naš tim.</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Biography -->
        <div class="card bg-base-100 shadow-xl mt-6">
            <div class="card-body">
                <h3 class="card-title">Biografija</h3>
                <p class="whitespace-pre-wrap">{{ $application->biography }}</p>
            </div>
        </div>

        <!-- Help Section -->
        <div class="mt-8 text-center">
            <p class="text-base-content/70 mb-4">Imate pitanja o svojoj prijavi?</p>
            <a href="" class="btn btn-outline btn-primary">
                Kontaktirajte nas
            </a>
        </div>
    </div>
</div>

<!-- Add this CSS for animations -->
<style>
    .timeline-container {
        animation: fadeInUp 0.3s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection
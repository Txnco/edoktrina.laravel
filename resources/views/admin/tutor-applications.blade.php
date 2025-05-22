
@extends('layouts.admin')

@section('main-content')

<!-- Main Layout -->
<div class="bg-base-100">
    <!-- Breadcrumbs -->
    <div class="mb-6">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li> 
                <li>{{ __('Prijave za instruktore') }}</li>
            </ul>
        </div>
        <h1 class="text-3xl font-bold mt-2">{{ __('Prijave za instruktore') }}</h1>
    </div>

    <!-- Status Filters -->
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('admin.tutors.applications') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline' }}">
            Sve prijave
        </a>
        <a href="{{ route('admin.tutors.applications', ['status' => 'pending']) }}" class="btn btn-sm {{ request('status') == 'pending' ? 'btn-primary' : 'btn-outline' }}">
            Na čekanju
        </a>
        <a href="{{ route('admin.tutors.applications', ['status' => 'approved']) }}" class="btn btn-sm {{ request('status') == 'approved' ? 'btn-primary' : 'btn-outline' }}">
            Odobrene
        </a>
        <a href="{{ route('admin.tutors.applications', ['status' => 'rejected']) }}" class="btn btn-sm {{ request('status') == 'rejected' ? 'btn-primary' : 'btn-outline' }}">
            Odbijene
        </a>
    </div>

    <!-- Table Container -->
    <table id="applicationsTable" class="w-full">
        <thead class="bg-base-200">
            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Korisnik</th>
                <th class="px-4 py-3">Iskustvo</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Datum prijave</th>
                <th class="px-4 py-3 text-center">Akcije</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-base-200">
            @foreach($applications as $application)
            <tr class="hover:bg-base-200">
                <td class="px-4 py-3">{{ $application->id }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-3">
                        <div class="avatar">
                            <div class="mask mask-squircle w-10 h-10">
                                @if($application->user->profile_photo_url)
                                    <img src="{{ $application->user->profile_photo_url }}" alt="{{ $application->user->first_name }}">
                                @else
                                    <div class="avatar placeholder">
                                        <div class="bg-primary text-primary-content w-10 h-10 rounded-full">
                                            <span>{{ strtoupper(substr($application->user->first_name, 0, 1)) }}{{ strtoupper(substr($application->user->last_name, 0, 1)) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('user.profile', ['username' => $application->user->username]) }}" class="font-bold link">
                                {{ $application->user->first_name }} {{ $application->user->last_name }}
                            </a>
                            <div class="text-sm opacity-70">{{ "@" . $application->user->username }}</div>
                        </div>
                    </div>
                </td>
               
                <td class="px-4 py-3">
                    <div class="badge badge-neutral">{{ $application->experience_years }} {{ $application->experience_years == 1 ? 'godina' : ($application->experience_years < 5 ? 'godine' : 'godina') }}</div>
                    @if($application->online_experience)
                        <div class="badge badge-info badge-sm ml-1">Online</div>
                    @endif
                </td>
                <td class="px-4 py-3">
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
                </td>
                <td class="px-4 py-3">
                    <div class="text-sm">{{ $application->created_at->format('d.m.Y.') }}</div>
                    <div class="text-xs opacity-70">{{ $application->created_at->format('H:i') }}</div>
                </td>
                <td class="px-4 py-3 text-center">
                    <div class="dropdown dropdown-end">
                        <button class="btn btn-sm btn-ghost" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        
                        <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-[100] border border-base-200">
                            {{-- <li><a href="{{ route('admin.tutors.applications.show', $application->id) }}" class="text-sm hover:bg-base-200">Pregledaj detalje</a></li> --}}
                            
                            @if($application->status == 'pending')
                                <li>
                                    <form action="{{ route('admin.tutor.applications.approve', $application->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success ">Odobri</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.tutor.applications.reject', $application->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-error ">Odbij</button>
                                    </form>
                                </li>
                            @endif
                            
                            <li>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error ">Izbriši</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if(count($applications) == 0)
        <div class="flex flex-col items-center justify-center p-12 text-center bg-base-200 rounded-lg mt-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-base-content/40 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-lg font-medium mb-2">Nema pronađenih prijava</h3>
            <p class="text-base-content/60">Trenutno nema prijava za instruktore koje odgovaraju vašim kriterijima pretraživanja.</p>
        </div>
    @endif
</div>

<script>
    $(document).ready(function() {
      $('#applicationsTable').DataTable({
          responsive: {
              details: true
          },
          autoWidth: false,
          language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/hr.json'
            },
          dom: '<"flex flex-wrap justify-between items-center mb-4"<"flex gap-2"f><"flex gap-2"l>>rt<"flex flex-wrap justify-between items-center mt-4"<"flex gap-2"i><"flex gap-2"p>>',
          initComplete: function() {
            $('.dataTable').addClass('shadow-md rounded-md');
            
            // DaisyUI styling for inputs
            $('.dataTables_filter input')
                .addClass('input input-bordered input-sm ml-2 mt-1')
                .attr('placeholder', '{{ __('Pretraži') }}...');
            
            $('.dataTables_length select')
                .addClass('select select-bordered select-sm mt-1');

            const lengthSelect = $('.dataTables_length select');
            const options = lengthSelect.find('option').map((i, opt) => 
                `<li><a data-value="${opt.value}">${opt.text}</a></li>`
            ).get().join('');
            
            lengthSelect.parent().html(`
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-sm btn-ghost m-1">
                        {{ __('Prikaži') }} ${lengthSelect.val()} {{ __('rezultata') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box shadow-lg z-[1] w-36 p-2">
                        ${options}
                    </ul>
                </div>
            `);
            
            // Handle dropdown selection
            $('.dataTables_length .dropdown-content a').on('click', function() {
                const value = $(this).data('value');
                const btnText = `Prikaži ${value} rezultata`;
                
                // Update button text
                $('.dataTables_length [role="button"]').html(`
                    ${btnText}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                `);
                
                // Update DataTables page length
                $('#applicationsTable').DataTable().page.len(value).draw();
            });
          },
          drawCallback: function() {
              // Remove the span wrapper completely
              $('.dataTables_paginate span').contents().unwrap();
              
              // DaisyUI pagination styling
              $('.dataTables_paginate')
                  .addClass('join')
                  .find('.paginate_button')
                  .addClass('join-item btn btn-sm')
                  .removeClass('paginate_button');
              
              // Special styling for current page
              $('.paginate_button.current')
                  .addClass('btn-active')
                  .html((this.api().page() + 1));
              
              // Add icons and adjust text
              $('#applicationsTable_previous').html('<span>«</span><span class="hidden sm:inline">Nazad</span> ');
              $('#applicationsTable_next').html(' <span class="hidden sm:inline">Naprijed</span><span>»</span>');
              
              // Adjust disabled buttons
              $('.paginate_button.disabled').addClass('btn-disabled');
          },
          columnDefs: [
              { 
                  className: 'text-center',
                  targets: [0,  2, 3, 4, 5]
              },
              { 
                  orderable: false, 
                  targets: 5
              },
              { 
                  width: '5%', 
                  targets: 0 
              },
              { 
                  width: '10%', 
                  targets: 5
              }
          ],
          order: [[0, 'desc']]
      });
    });
</script>

@endsection

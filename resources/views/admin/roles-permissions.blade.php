@extends('layouts.admin')

@section('main-content')


<!-- Main Layout -->
<div class="bg-base-100 mb-20">
    <!-- Breadcrumbs -->
    <div class="mb-6">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li> 
                <li>{{ __('Uloge i dozvole') }}</li>
            </ul>
        </div>
        <h1 class="text-3xl font-bold mt-2">{{ __('Uloge') }}</h1>
    </div>

    <!-- Table Container -->
    <table id="rolesTable" class="w-full  mb-5">
        <thead id="rolesTableHead" class="bg-base-200 ">
            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Naziv</th>
                <th class="px-4 py-3">Guard name</th>
                <th class="px-4 py-3">Napravljeno</th>
                <th class="px-4 py-3">Ažurirano</th>
                <th class="px-4 py-3 text-center">Akcije</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-base-200">
            @foreach($roles as $role)
            <tr class="hover:bg-base-200">
                <td class="px-4 py-3">{{ $role->id }}</td>
                <td class="px-4 py-3">{{ $role->name }}</td>
                <td class="px-4 py-3">{{ $role->guard_name }}</td>
                <td class="px-4 py-3">{{ $role->created_at->format("d.m.Y h:s") }}</td>
                <td class="px-4 py-3">{{ $role->updated_at->format("d.m.Y h:s") }}</td>
                <td class="px-4 py-3 text-center relative">
                    <div class="dropdown dropdown-end">
                        <button class="btn btn-sm btn-ghost" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        
                        <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-[100] border border-base-200">
                            <li><a href="" class="text-sm hover:bg-base-200">Uredi</a></li>
                            <li>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-error hover:bg-base-200 ">Izbriši</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="divider"></div>

    <!-- Breadcrumbs -->
    <div class="mt-6">
        <h1 class="text-3xl font-bold mb-5">{{ __('Dozvole') }}</h1>
    </div>

    <!-- Table Container -->
    <table id="permissionsTable" class="w-full  ">
        <thead id="permissionsTableHead" class="bg-base-200 ">
            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Naziv</th>
                <th class="px-4 py-3">Guard name</th>
                <th class="px-4 py-3">Napravljeno</th>
                <th class="px-4 py-3">Ažurirano</th>
                <th class="px-4 py-3 text-center">Akcije</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-base-200">
            @foreach($permissions as $permission)
            <tr class="hover:bg-base-200">
                <td class="px-4 py-3">{{ $permission->id }}</td>
                <td class="px-4 py-3">{{ $permission->name }}</td>
                <td class="px-4 py-3">{{ $permission->guard_name }}</td>
                <td class="px-4 py-3">{{ $permission->created_at->format("d.m.Y h:s") }}</td>
                <td class="px-4 py-3">{{ $permission->updated_at->format("d.m.Y h:s") }}</td>
                <td class="px-4 py-3 text-center relative">
                    <div class="dropdown dropdown-end">
                        <button class="btn btn-sm btn-ghost" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        
                        <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-[100] border border-base-200">
                            <li><a href="" class="text-sm hover:bg-base-200">Uredi</a></li>
                            <li>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-error hover:bg-base-200 ">Izbriši</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function() {
      $('#rolesTable').DataTable({
          responsive: {
              details: true // Disable responsive hidden columns
          },
          autoWidth: false,
          language: {
              url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/hr.json'
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
                  <div class="dropdown dropdown-end ">
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
                  $('#rolesTable').DataTable().page.len(value).draw();
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
              $('#rolesTable_previous').html('<span>«</span><span class="hidden sm:inline">Nazad</span> ');
              $('#rolesTable_next').html(' <span class="hidden sm:inline">Naprijed</span><span>»</span>');
              
              // Adjust disabled buttons
              $('.paginate_button.disabled').addClass('btn-disabled');

          },
          columnDefs: [
              { 
                  className: 'text-center', // Apply text-center to all columns
                  targets: '_all' // Apply to all columns
              },
              { 
                  orderable: false, 
                  targets: 5,
                  className: 'dt-body-center'
              },
              { 
                  width: '7%', 
                  targets: 0 
              },
              { 
                  width: '15%', 
                  targets: 5 
              }
          ],
          order: [[0, 'desc']]
      });

      $('#permissionsTable').DataTable({
          responsive: {
              details: true // Disable responsive hidden columns
          },
          autoWidth: false,
          language: {
              url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/hr.json'
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
                  <div class="dropdown dropdown-end ">
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
                  $('#permissionsTable').DataTable().page.len(value).draw();
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
              $('#permissionsTable_previous').html('<span>«</span><span class="hidden sm:inline">Nazad</span> ');
              $('#permissionsTable_next').html(' <span class="hidden sm:inline">Naprijed</span><span>»</span>');
              
              // Adjust disabled buttons
              $('.paginate_button.disabled').addClass('btn-disabled');

          },
          columnDefs: [
              { 
                  className: 'text-center', // Apply text-center to all columns
                  targets: '_all' // Apply to all columns
              },
              { 
                  orderable: false, 
                  targets: 5,
                  className: 'dt-body-center'
              },
              { 
                  width: '7%', 
                  targets: 0 
              },
              { 
                  width: '15%', 
                  targets: 5 
              }
          ],
          order: [[0, 'desc']]
      });
    });
  
</script>

@endsection
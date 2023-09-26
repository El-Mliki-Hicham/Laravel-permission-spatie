<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users manager
        </h2>
    </x-slot>
    @role("admin")
     <div class="mt-3 ml-4">
         <a href="{{ route('users.create') }}" class="btn btn-primary">add user</a>
        </div>
        @endrole

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>user name</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $value)
                                            {{$value}}

                                        @endforeach


                                    </td>
                                    <td>
                                        @foreach ($user->getPermissionsViaRoles() as $permissions)
                                        <span class="badge bg-primary">
                                            {{ $permissions->name }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @role("admin")
                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-warning">Delete</a>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        let table = new DataTable('#myTable');
    </script>
</x-app-layout>

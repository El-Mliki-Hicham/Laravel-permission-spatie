{{-- <select name="permissions[]" multiple id="">
    @foreach ($permissions as $permission )
    <option value="{{$permission->id}}">{{$permission->name}} </option>
    @endforeach
</select> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create user
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route("users.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Name</label>
                          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Email</label>
                          <input type="email" class="form-control"  name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1"> Password</label>
                          <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="password">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Select permissions</label>
                          <select class="form-control select" name="permissions[]"  multiple id="exampleFormControlSelect1">
                            @foreach ($permissions as $permission)
                            <option value="{{$permission->id}}">{{$permission->name}} </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Select roles</label>
                          <select class="form-control select" name="roles[]"  multiple id="exampleFormControlSelect1">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mt-4">
                        <button type="btn" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

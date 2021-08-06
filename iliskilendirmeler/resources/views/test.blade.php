@foreach($user->role as $role)
{{$role->baslik}}


@endforeach

@foreach($roles->user as $users)
{{$users->name}}
{{$users->email}}

@endforeach

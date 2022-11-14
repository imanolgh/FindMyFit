<div>
    @foreach($social_data as $person)
        <div>{{$person->name}}</div>
        <div>{{$person ->email}}</div>
    @endforeach
</div>
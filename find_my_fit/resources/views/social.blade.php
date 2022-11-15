<div>
    @foreach($social_data as $person)
        <div>{{$person->name}}</div>
        <div>{{$person ->email}}</div>
        <div class="container">
            <form method="post" action="{{ route('get_other_account') }}"
                enctype="multipart/form-data">
                @csrf
                <input type='hidden' name='user_id' value='{{ $person->id}}'>
                <input type="submit" value="view account" >
 
            </form>
        </div>
    @endforeach
</div>
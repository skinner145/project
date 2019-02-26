@component('mail::message')
# Fixture Created
Dear {{$fixture->user->name}}, <br>
You have been assigned to : <br>
{{ $fixture->homeTeam }} vs {{ $fixture->awayTeam }}


@component('mail::button', ['url' => url('/fixtures/' . $fixture->id)])
View Fixture
@endcomponent

Thanks,<br>
On The Ball
@endcomponent

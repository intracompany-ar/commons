<meta name='robots' content='noindex,nofollow'>
<meta name="googlebot" content="noindex">
<meta name="url-base" content="{{ config('app.url_intra') }}">

@auth
    <meta name="auth-id" content="{{ auth()->id() }}">
    <meta name="auth-name" content="{{ auth()->user()->name }}">
    <meta name="auth-email" content="{{ auth()->user()->email }}">
    <meta name="person-id" content="{{ auth()->user()->person_id }}">
    <meta name="person-first-name" content="{{ auth()->user()->person->first_name }}">
    <meta name="profile-photo" content="{{ auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : asset('storage/img/bib.png') }}">
@endauth
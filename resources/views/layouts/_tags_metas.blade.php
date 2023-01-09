{{-- Antes: config('app.url') --> No funcionan los links a id dentro de la misma página --> Lo cambio por url()->current(). --}}
<base href="{{ url()->current() }}">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
{{-- , user-scalable=no no hace falta mientras programe responsive --}}
<meta name="format-detection" content="telephone=no">
<meta name="author" content="Dux Ducis Arsen">
<link rel="manifest" href="/manifest.json">


<meta name="app-id" content="{{ $applicationId ?? 1 }}">
@intra
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='robots' content='noindex,nofollow'>
    <meta name="googlebot" content="noindex">
    <meta name="theme-color" content="#d72f23">
    <meta name="description" content="IceO, estionar tu empresa va a ser un juego de niños. ERP a tu medida.">
    <meta name="url-base" content="{{ config('app.url_intra') }}">
    
    @auth
        <meta name="auth-id" content="{{ auth()->id() }}">
        <meta name="auth-name" content="{{ auth()->user()->name }}">
        <meta name="auth-email" content="{{ auth()->user()->email }}">
        <meta name="person-id" content="{{ auth()->user()->person_id }}">
        <meta name="person-first-name" content="{{ auth()->user()->person->first_name }}">
        <meta name="profile-photo" content="{{ auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : asset('storage/img/bib.png') }}">
    @endauth
@else
    @urlcontiene( 'neuper' )

        <meta name="theme-color" content="#d72f23">
        <meta name="description" content="Neuper, distribuidor oficial de neumáticos Fate en la zona sur de Provincia de Santa Fe, sur de Córdoba, norte de Buenos Aires y La Pampa. En sus sucursales se brinda servicios de gomeria, alineación, balanceo, tren delantero, frenos.">
        <meta name="keywords" content="neumáticos, rueda, goma, automóvil, auto, camioneta, transporte, camión, acoplado, chasis, colectivo, agrícola, cosechadora, tractor, seguridad, alineación, balanceo, reconstrucción, vial, ruta, tracción , maquinaria, banda de rodamiento, motoniveladoras , palas cargadoras, suv, infladotires, providers, refate">

        {{-- Redes Sociales --}}
        <meta property="og:url" content="https://neuper.com.ar">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ config('app.title.neuper') }}">
        <meta property="og:description" content="Neuper, distribuidor oficial de neumáticos Fate en la zona sur de Provincia de Santa Fe, sur de Córdoba, norte de Buenos Aires y La Pampa. En sus sucursales se brinda servicios de gomeria, alineación, balanceo, tren delantero, frenos.">
        <meta property="og:image" content="https://www.fate.com.ar/assets/img/pininfarinasport.jpg">

        <link rel="canonical" href="https://neuper.com.ar"/>

    @elseurlcontiene( 'neumaticossantarosa' )

        <meta name="theme-color" content="#27509B">
        <meta name="description"            content="Neumáticos Santa Rosa. Revendedor oficial de neumáticos Michelin en Venado Tuerto. Venta de neumáticos para auto, camioneta, camión y agro. Servicios de gomeria, alineación, balanceo, tren delantero, frenos.">
        <meta name="keywords"               content="neumáticos, rueda, goma, automóvil, auto, camioneta, transporte, camión, acoplado, chasis, colectivo, agrícola, cosechadora, tractor, seguridad, alineación, balanceo, reconstrucción, vial, ruta, tracción , maquinaria, banda de rodamiento, motoniveladoras , palas cargadoras, suv, infladotires, providers, refate, Michelin, neumáticos, Venado Tuerto, Alineación, Balanceo, Gomería">


        {{-- Redes Sociales --}}
        <meta property="og:url"         content="https://neumaticossantarosa.com.ar">
        <meta property="og:type"        content="article">
        <meta property="og:title"       content="Neumáticos Santa Rosa - Michelin">
        <meta property="og:description" content="Neumáticos Santa Rosa. Revendedor oficial de neumáticos Michelin en Venado Tuerto. Venta de neumáticos para auto, camioneta, camión y agro. Servicios de gomeria, alineación, balanceo, tren delantero, frenos.">
        <meta property="og:image"       content="https://media.michelinman.com/content/dam/master/Michelin/tires/primacy-4/primacy-4.png">

        <link rel="canonical" href="https://neumaticossantarosa.com.ar"/>

    @endurlcontiene

@endintra

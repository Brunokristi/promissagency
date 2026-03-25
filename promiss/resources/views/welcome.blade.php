<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Promiss | Personálna a hostesingová agentúra</title>
    <meta name="description" content="Promiss je personálna a hostesingová agentúra, ktorá poskytuje profesionálny personál pre rôzne eventy a podujatia. Naša agentúra sa zameriava na poskytovanie kvalitných služieb a zabezpečenie spokojnosti našich klientov. Sme tu, aby sme vám pomohli nájsť ten správny personál pre vaše potreby, či už ide o hostesky, promotérov, alebo iný personál pre vaše podujatie. Kontaktujte nás ešte dnes a zistite, ako vám môžeme pomôcť s vašimi personálnymi potrebami!">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
       
    @vite('resources/js/app.js')

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6PH45PHNGR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-6PH45PHNGR');
    </script>

</head>
<body>
    <div id="app"></div>
</body>
</html>
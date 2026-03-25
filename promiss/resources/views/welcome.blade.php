<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Promiss | Personálna a hostesingová agentúra</title>

    <meta
        name="description"
        content="Promiss je personálna a hostesingová agentúra, ktorá poskytuje profesionálny personál pre eventy, podujatia, promo akcie a firemné akcie. Zabezpečujeme spoľahlivé hostesky, promotérov a personál podľa vašich potrieb."
    >
    <meta
        name="keywords"
        content="personálna agentúra, hostesingová agentúra, hostesky, promotéri, event personál, promo akcie, personál na podujatia, Promiss"
    >
    <meta name="robots" content="index, follow">
    <meta name="author" content="Promiss Agency">

    <link rel="canonical" href="https://promissagency.com/">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://promissagency.com/">
    <meta property="og:title" content="Promiss | Personálna a hostesingová agentúra">
    <meta
        property="og:description"
        content="Promiss je personálna a hostesingová agentúra, ktorá poskytuje profesionálny personál pre eventy, podujatia, promo akcie a firemné akcie."
    >
    <meta property="og:image" content="https://promissagency.com/og-image.jpg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Promiss | Personálna a hostesingová agentúra">
    <meta
        name="twitter:description"
        content="Promiss je personálna a hostesingová agentúra, ktorá poskytuje profesionálny personál pre eventy, podujatia, promo akcie a firemné akcie."
    >

    <meta name="twitter:image" content="https://promissagency.com/og-image.jpg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap"
        rel="stylesheet"
    >

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6PH45PHNGR"></script>
    <script>
        window.PROMISS_GA_MEASUREMENT_ID = 'G-6PH45PHNGR';
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        window.gtag = gtag;

        gtag('js', new Date());
        gtag('consent', 'default', {
            analytics_storage: 'denied',
            ad_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied',
            wait_for_update: 500
        });
    </script>

    @vite('resources/js/app.js')
</head>
<body>
    <div id="app"></div>
</body>
</html>
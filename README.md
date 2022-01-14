PER AVVIARE IL PROGETTO:
0. importare il progetto da git hub
1. creare un nuovo database su xampp chiamato treebu
2. aprire un terminale, entrare nella cartella server e digitare: composer install, php artisan migrate e php artisan serve
3. aprire un nouvo terminale, entrare nella cartella client e digitare: npm install, npm run serve
4. una volta avviata l'applicazione sarà possibile accedere al link del localhost visibile sul terminale

TABELLE
All'internO del database vi è solamente una tabella, lands, con i seguenti campi:
    id
    created_a
    updated_at
    comune
    foto
    dimensione
    foglio_catastale
    mappale_catastale
    parcella_catastale
    terreno
    irrigazione
    offerta
    canone
    disponibile

MODELLI
è stato creato un modello chiamato Land ed un controller chiamato LandController

ROUTE
le rotte all'interno del progetto son:
Route::post("create",[LandController::class,"create"]); -> per inserire un nuovo terreno
Route::get("land",[LandController::class,"allLand"]); -> per visualizzare tutti i terreni ordinati in base all'ultima pubblicazione
Route::get("land/{id}",[LandController::class,"land"]);-> per vedere in dettaglio un terreno
Route::put("modify/{id}",[LandController::class,"modify"]); -> per modificare un terreno
Route::post("dimensione",[LandController::class,"dimensione"]); -> per ordinare il terreno in base alla dimensione


PROGETTO    
Una volta avviato il progetto ed essere andati sul localhost, ci si troverà nella home di treebu, sarà visibile solamente la navbar con i tasti home e aggiungi, perchè non vi è ancora niente all'interno del satabse.
Per aggiungere un nuovo terreno si potrà premere su pulsante aggiungi e inserire i valori, vi sarà un campo nascosto fino a che non verrà scelta il tipo di offerta, se l'offerta sarà di affitto o vendita comparirà il campo canone, mentre se l'offerta sarà ad affido gratuito il campo non verrà richiesto. Una volta creato un nuovo terreno si verrà riportati alla home, verranno mostrati tutti i terreni ordinati in base alla data di pubblicazione.
Proseguendo si potranno aggiungere nuovi terreni,
modificarli una volta che premi modifica, verrai reindirezzato nella stessa pagine per aggiungere un nuovo terren ma i dati in input saranno già popolati.
Inoltre si potrà osservare nel dettaglio un terreno ed ordinarli in base alla dimensione.

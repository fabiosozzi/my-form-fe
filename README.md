# My Form FE

Un Frontend sviluppato in Laravel per gestire le iscrizioni ad un form. 

## Istruzioni

Dopo aver clonato il repository, copiare il file **.env.example** e rinominarlo **.env**.
Cambiare le impostazioni del DB con i dati della propria istanza di MySQL, l'**APP_URL** del sito e la variabile **BACKEND_URL** per impostare l'url del Backend.
Qualora si volesse cambiare la chiave segreta che permette la comunicazione tra BE e FE, cambiare la variabile di environment **API_SECRET_KEY** sia in FE che in BE.
A questo punto lanciare i comandi bash

```bash
    composer install
    npm install

    php artisan migrate:fresh
    php artisan optimize
```

Avviare l'ambiente di sviluppo e l'elaborazione della coda con i comandi:

```bash
    npm run dev
```

Andando all'indirizzo impostato nell'APP_URL (ad esempio http://my-form-fe.test) si può accedere al form di invio dei contatti.


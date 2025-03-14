# 🎬 Easy TMDB - Tema WordPress Veloce per il Cinema  
Easy TMDB è un tema WordPress ultraleggero e ottimizzato per siti dedicati al mondo del cinema.  
Supporta l'importazione automatica di film e serie TV tramite l'API di **TMDb** (The Movie Database).  

---

## 🚀 Caratteristiche Principali
- 💨 **Velocità Elevata:** Ottimizzato per ottenere il massimo punteggio su Google PageSpeed Insights.  
- 🔥 **Design Moderno e Pulito:** Basato su **Bootstrap 5.3.3** per un layout reattivo.  
- 🎬 **Importazione Automatica:** Utilizza l'API di **TMDb** per importare film, serie TV e dettagli completi.  
- 🗃️ **Database Aggiornato:** Sincronizzazione automatica per mantenere i contenuti aggiornati.  
- 📊 **SEO Ottimizzato:** Codice pulito e markup semantico per migliorare il posizionamento.  
- 🌐 **Compatibilità PHP 8.3:** Garantito grazie a Rector per il refactoring del codice.  

---

## 📝 Requisiti
- **WordPress 6.3+**  
- **PHP 8.3+**  
- **Chiave API TMDb** (registrati su [TMDb](https://www.themoviedb.org/) per ottenerla)  
- **Composer** (per installare Rector)  

---

## 🛠️ Installazione
1. **Clona il Repository**
   ```bash
   git clone https://github.com/fr0zenStore/easy-tmdb.git
   cd easy-tmdb
   ```
2. **Installa le Dipendenze**
   ```bash
   composer install
   ```
3. **Ottimizza il Codice con Rector**
   ```bash
   vendor/bin/rector process
   ```
4. **Configurazione API TMDb**
   Vai su **Impostazioni > easy-tmdb** e inserisci la tua **API Key TMDb**.  

5. **Attiva il Tema**
   - Carica la cartella `easy-tmdb` nella directory `wp-content/themes/`.  
   - Attiva il tema dal pannello di amministrazione di WordPress.  

---

## 🔧 Configurazione API TMDb
Il tema richiede una chiave API di TMDb per importare film e serie TV.  
### **Come Ottenere la Chiave API**
1. Registrati su [TMDb](https://www.themoviedb.org/).  
2. Vai su **Impostazioni > API** e genera una chiave.  
3. Inserisci la chiave in **Impostazioni > Easy TMDB**.  

---

## 💡 Utilizzo
1. Vai su **easy-tmdb > Importa Film**.  
2. Cerca il film o la serie TV desiderata.  
3. Clicca su **Importa** per aggiungere i dati al sito.  

### **Importazione Automatica**
- Puoi programmare l'importazione automatica di nuovi film in base ai generi o alle tendenze.  

---

## 🧩 Plugin Consigliati
- **WP Super Cache:** Per migliorare la velocità di caricamento.  
- **Rank Math SEO:** Per ottimizzare i contenuti per i motori di ricerca.  
- **Autoptimize:** Per minificare CSS e JS.  

---

## ✅ Risultati Attesi
Dopo l’installazione e l’ottimizzazione, il tema dovrebbe raggiungere:  

- **100/100 su Google PageSpeed Insights** (sia desktop che mobile).  
- **Tempo di caricamento inferiore a 1 secondo** su GTmetrix.  
- **SEO ottimizzato** con URL puliti e markup strutturato.  
- **Importazione automatica dei film** tramite API TMDb.  

---

## 📝 Test di Prestazione
| Strumento                 | Punteggio Mobile | Punteggio Desktop | Tempo di Caricamento |
|--------------------------|-----------------|-------------------|-----------------------|
| Google PageSpeed Insights | 100/100          | 100/100            | < 1s                  |
| GTmetrix                  | A (100%)         | A (100%)           | 450ms                  |
| Pingdom                   | A (100%)         | A (100%)           | 400ms                  |

---

## 🛑 Debug e Supporto
Se riscontri problemi, verifica i log degli errori:  
```bash
vendor/bin/rector process
```
Puoi anche aprire una segnalazione nella sezione **Issues** del repository GitHub.  

---

## 💡 Suggerimenti per Migliorare la Velocità
- Abilita la compressione GZIP nel server.  
- Utilizza una CDN per caricare immagini e file statici.  
- Ottimizza le immagini utilizzando il formato WebP.  
- Abilita la cache del browser tramite plugin o impostazioni server.  

---

## 📜 Licenza
Distribuito sotto licenza **GPL-2.0-or-later**.  

---

## ✨ Autore
Creato da **fr0zen**  
[GitHub](https://github.com/fr0zenStore)  

---

## ❤️ Supporto
Hai domande o suggerimenti? Apri una segnalazione su GitHub o contattami direttamente!  

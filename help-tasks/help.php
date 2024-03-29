﻿<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);

  $title = "Περιεχόμενα χρήσης του προγράμματος";
?>

<?php include("../partials/head.inc.php") ?>
<?php include("../partials/menu.inc.php") ?>
<h4>Οδηγίες Λειτουργίας Προγράμματος</h4>
<i>Πατήστε πάνω στην ερώτηση που σας ενδιαφέρει</i>
<br /><br />


<a href="javascript:;" class="question">1. Εγκατάσταση του προγράμματος σε άλλον υπολογιστή</a>
<div class="answer">
<p>
Για να λειτουργήσει σωστά το πρόγραμμα, απαιτείται η εγκατάσταση των εξής προγραμμάτων:
<ul>
<li>Apache</li>
<li>PHP</li>
<li>MySQL</li>
<li>Google Chrome 19+</li>
<li>Office 2003+</li>
</ul>
</p>
<p>Στον παρόν οδηγό θα παρουσιαστεί η μέθοδος για την εγκατάσταση των παραπάνω με έναν
εύκολο τρόπο. Τρέξτε το πρόγραμμα <a href="/programs/WampServer2.0c.exe">wamp</a> και 
ακολουθήστε τα βήματα εγκατάστασης του (χωρίς να αλλάξετε τις προτεινόμενες ρυθμίσεις 
του προγράμματος). Μόλις ολοκληρωθεί θα έχει δημιουργηθεί στο C:\ ένας φάκελος με το όνομα
wamp.</p>

<p>Σύρετε τα αρχεία του προγράμματος που βρίσκονται στον φάκελο <strong>www</strong> μέσα στον φάκελο
<strong>C:\wamp</strong> και πατήστε "Ναι" αν σας προτείνει να αντικαταστήσει κάποιο αρχείο.
</p>

<p>Για την καλύτερη χρήση του προγράμματος, χρησιμοποιήστε τον 
<a href="/programs/ChromeStandaloneSetup.exe">Google Chrome</a>. Εγκαταστήστε το 
πατώντας διπλό κλικ επάνω του. Θα εγκατασταθεί και θα ανοίξει το πρόγραμμα Google Chrome.
</p>
<p>
Για να ξεκινήσει για πρώτη φορά το πρόγραμμα "Αποστολή Συμπληρώσεως" πατήστε στη διεύθυνση
του Google Chrome <a href="http://localhost/init.php">http://localhost/init.php</a>.
</p>
 
Για να περιηγηθείτε στο πρόγραμμα "Αποστολή Συμπληρώσεως" πατήστε στην μπάρα τη διεύθυνση
<a href="http://localhost">http://localhost</a>. Για να το θυμάται ακολουθήστε τις εικόνες:<br />
<img src="http://localhost/images/help-page/question1image1.png"></img>
<br />
1. Πατήστε το πλήκτρο πάνω δεξιά και επιλέξτε το "Ρυθμίσεις" όπως φαίνεται στην παραπάνω εικόνα 
<br /><br />
<img src="http://localhost/images/help-page/question1image2.png"></img>
<br />
2. Στην επόμενη εικόνα, πατήστε το πλήκτρο "Ορισμός σελίδων" όπως στην εικόνα, στη συνέχεια
επιλέξτε τη "Χρήση τρέχουσων σελιδών" και έπειτα το πλήκτρο "ΟΚ".


</p>
</div>

<br />
<a href="javascript:;" class="question">2. Αποθήκευση αλλαγών στα έντυπα</a>
<div class="answer">
<p>Για να αποθηκευτούν οι αλλαγές σε ένα έντυπο, απαιτείται η αποθήκευση του στη θέση που βρίσκεται μέσα στο πρόγραμμα.<br />
Ακολουθεί αναλυτικά η διαδικασία με φωτογραφίες.<br />
Αφού ανοίξουμε το έντυπο που μας ενδιαφέρει και πραγματοποιήσουμε τις αλλαγές, ακολουθούμε τα παρακάτω βήματα:
<ol>
<li>
Πατάμε το πλήκτρο αποθήκευσης στο εκάστοτε πρόγραμμα (word, excel κλπ.)<br />
<img src="/images/help-page/save-button.jpg" />
</li>
<li>
Στο παράθυρο που μας εμφανίζεται, επιλέγουμε τη θέση που βρίσκεται το πρόγραμμα. 
Η προκαθορισμένη θέση των εντύπων είναι στο <b>C:\wamp\www\entipa</b>. 

<p>Για να περιηγηθούμε στη θέση αυτή ακολουθούν βήμα-βήμα οδηγίες.</p>
<img src="/images/help-page/desktop.jpg" />
<br />
<p><i>Πατάμε το πλήκτρο της επιφάνειας εργασίας</i></p>
<br />

<img src="/images/help-page/hard-disk.jpg" />
<p><i>Κάνουμε διπλό κλικ στον σκληρό δίσκο που βρίσκεται η εφαρμογή (συνήθως στον C:)</i></p>
<br />

<p><i>Στη συνέχεια επιλέγουμε και κάνουμε άνοιγμα τους φακέλους wamp -> www -> entipa όπου βρίσκονται τα έντυπα της εφαρμογής, όπως φαίνονται στις φωτογραφίες</i></p>
<img src="/images/help-page/wamp-folder.jpg" />
<br />

<img src="/images/help-page/www-folder.jpg" />
<br />

<img src="/images/help-page/entipa-folder.jpg" />
<br />
<br />
<i>Βρίσκουμε το όνομα του εντύπου, το επιλέγουμε και πατάμε "Αποθήκευση". Στη συνέχεια επιλέγουμε να αντικατασταθεί.</i>
<img src="/images/help-page/replace-file.jpg" />
</li>
</ol>
</p>
</div>
<?php include("../partials/footer.inc.php") ?>
<link rel="stylesheet" href="/css/help-page.css" />
<script src="/js/help-page.js"></script>
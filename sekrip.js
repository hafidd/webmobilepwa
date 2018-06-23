var indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;

var DB_NAME = 'database';
var DB_VERSION = 1;
var STORE_NAME = 'cart';
var db;

var request = indexedDB.open(DB_NAME, DB_VERSION);
request.onupgradeneeded = function () {
    // Create a new object store if this is the first time we're using
    // this DB_NAME/DB_VERSION combo.
    var objectDb = request.result.createObjectStore(STORE_NAME, {autoIncrement: true});
    objectDb.createIndex('index_kode', 'kode', {unique: false});
    objectDb.createIndex('index_produk', 'produk', {unique: false});
    objectDb.createIndex('index_harga', 'harga', {unique: false});
};
request.onsuccess = function () {
    db = request.result;
};

function tambah(kode, produk, harga) {
    var transaction = db.transaction(STORE_NAME, 'readwrite');
    var objectStore = transaction.objectStore(STORE_NAME);
    // data
    var data = {
        kode: kode,
        produk: produk,
        harga: harga,
    }
    // Add data
    objectStore.put(data).onsuccess = function () {
        alert(data.produk + " berhasil ditambahkan");
    };
}

function hapus(key) {
    var transaction = db.transaction(STORE_NAME, 'readwrite');
    var objectStore = transaction.objectStore(STORE_NAME);    
    // Delete data
    objectStore.delete(key).onsuccess = function () {
        tampil();
    };
}

function clear() {
    var transaction = db.transaction(STORE_NAME, 'readwrite');
    var objectStore = transaction.objectStore(STORE_NAME);    
    // Delete data
    objectStore.clear().onsuccess = function () {
        tampil();
    };
}

function tampil() {
    var transaction = db.transaction(STORE_NAME, 'readonly');
    var objectStore = transaction.objectStore(STORE_NAME);
    var isi = "";
    var no = 1;
    request = objectStore.openCursor();

    request.onerror = function(event) {console.err("error fetching data");};
    request.onsuccess = function(event) {
        let cursor = event.target.result;
        
        if (cursor) {
         let key = cursor.primaryKey;
         let value = cursor.value;
         isi += '<tr>' +
         '<td id="isi">'+ no++ +'</td>' +
         '<td>' + value.produk + '</td>' +
         '<td>' + value.harga + '</td>' +
         '<td><button class="btn btn-warning btn-xs" onclick="hapus('+key+')";><span class="glyphicon glyphicon-trash"></span></button></td>' +
         '</tr>';
         cursor.continue();
     }
     document.getElementById("isitabelcart").innerHTML = isi;
 };
}
import './bootstrap.js';

import PouchDB from 'pouchdb-browser';
import PouchDBFind from 'pouchdb-find';

PouchDB.plugin(PouchDBFind);

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

var db = new PouchDB('cards');
db.replicate.from('http://symfony:password@127.0.0.1:5984/cards', {live: true});
db.allDocs({include_docs: true, descending: true}, function (err, doc) {
    doc.rows.forEach(console.log);
});


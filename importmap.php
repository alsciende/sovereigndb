<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'pouchdb' => [
        'version' => '8.0.1',
    ],
    'immediate' => [
        'version' => '3.3.0',
    ],
    'spark-md5' => [
        'version' => '3.0.2',
    ],
    'uuid' => [
        'version' => '8.3.2',
    ],
    'vuvuzela' => [
        'version' => '1.0.3',
    ],
    'pouchdb-find' => [
        'version' => '8.0.1',
    ],
    'pouchdb-errors' => [
        'version' => '8.0.1',
    ],
    'pouchdb-fetch' => [
        'version' => '8.0.1',
    ],
    'pouchdb-abstract-mapreduce' => [
        'version' => '8.0.1',
    ],
    'pouchdb-md5' => [
        'version' => '8.0.1',
    ],
    'pouchdb-collate' => [
        'version' => '8.0.1',
    ],
    'pouchdb-selector-core' => [
        'version' => '8.0.1',
    ],
    'pouchdb-utils' => [
        'version' => '8.0.1',
    ],
    'pouchdb-collections' => [
        'version' => '8.0.1',
    ],
    'pouchdb-binary-utils' => [
        'version' => '8.0.1',
    ],
    'pouchdb-mapreduce-utils' => [
        'version' => '8.0.1',
    ],
    'pouchdb-browser' => [
        'version' => '8.0.1',
    ],
];

Mysql Dummy Data
=======================

A command line tool to generate rows of dummy data for a specific table.

## Installation

    1) composer install

    2) cp database.ini.dist database.ini // Edit with right db access

## How to use

    Show all tables
        php index.php table:show

    Show a specific table [tablename]
        php index.php table:show [tablename]

    Fill a table [tablename] with dummy [number] rows
        php index.php table:fill [tablename] [number]

## TODO support other data types

    1) ENUM

    2) BLOB

    3) DATE, DATETIME, TIMESTAMP, TIME, YEAR

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

## Example

    mysql < test.sql

    php index.php table:fill example1 1000000
        string(15) "Memory: 1512048"
        string(20) "Start Memory: 234168"
        string(26) "Used time: 74.769246101379"

```
mysql> select * from example1 limit 100;
+-----+--------------+------+--------------------------------------------------+---------------------+---------+
| id  | name         | age  | description                                      | created             | salary  |
+-----+--------------+------+--------------------------------------------------+---------------------+---------+
|   1 | WJEvX        |    6 | fxhfkoyoRSrQpeEutqA                              | 2033-06-20 04:23:21 | 5502.65 |
|   2 | FbmixL       | 7322 | rwnoFUQiUQlZWuGMRPyKYBd                          | 1999-09-23 17:05:02 | 2378.23 |
|   3 | rSfsv        | 3150 | alekYlFCRLigzTBPYCjUJfCdNYDgBJm                  | 2017-06-10 20:37:25 | 2550.96 |
|   4 | rv           |   15 | vZFASonjdmiScFmaaoeVQvmZT                        | 2003-04-01 03:15:02 | 8177.35 |
|   5 | stcQ         |   26 | hREIRPeZgsNv                                     | 1972-02-06 15:29:31 | 8888.46 |
|   6 | XRcunuN      |    5 | FrUhwrhzB                                        | 1998-02-17 18:26:47 | 2603.63 |
|   7 | HCXq         | 5653 | jPZukUUdXXpUAvlNvSzha                            | 2025-01-24 12:26:51 | 3764.21 |
|   8 | hkAhC        |  433 | TOCHzou                                          | 1974-07-09 05:52:23 | 7537.39 |
|   9 | bLqs         |    4 | jyagQnvqjlcskjsNNHWpLyYXuglTVjuoPWqpfhMdsFLuonEc | 1971-07-18 05:21:45 | 1376.77 |
|  10 | HUnkfG       |   87 | XdxAbPmJVDnMgliigPYKcPgERoiivauBzklcArMGCoCaR    | 2020-06-06 17:43:12 | 6445.01 |
```

## TODO support other data types

    1) BLOB
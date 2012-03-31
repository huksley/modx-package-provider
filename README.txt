Sample implementation of MODx Package Provider
----

Currenly sample package is defined in body of index.php.
This sample package will install single snippet TestSnippet in MODx resource tree.

The goal of this project is to create provider and packages which live on 
real filesystem and can be installed/updated in MODx as needed.

This PHP script requires fresh Apache2.2/PHP installation with ZipArchive extension.
Tested on latest updated Ubuntu 10.10.

INSTALLING

Copy to Apache2 site root or web folder.
Copy ht.access to .htaccess and modify to suit your needs.

ADDING IN MODX MANAGER

Select Package management -> Providers -> Add new provider

In Name set ____ Your repo name _____
In Service URL set URL to directory with index.php, e.g.
____ http://your-site-path/modxpackageprovider/ ____

After that you can choose on Packages tab, 
Download Extras -> Select a provider -> Your repo name

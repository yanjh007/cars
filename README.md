cars
====

what i worked

Config tips:
1. assets 
need copy to website root, include boottrap3.1,css,img,fonts,js(jquery1.11.1,js sha1 use for auth)

2. system 
codeigniter system,version 2.3.2

3. application


4. cidb.sql
database structure and some data, export sql

5. url rewrite config
ngnix.conf:
location /capp2 {
            index index.php;
            rewrite ^/capp2/(.*)+$ /capp2/index.php?$1; # it finally works
            # return 200 $request_uri; # it is for inspect what $request_uri is
            # try_files $uri $uri/ /blog/index.php$request_uri$is_args$args; # it gets 500 server error
}


apache:
.htaccess 

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
.htaccess, see misc/htsample file 


-------------------------------------------------------------------------
dev journal
# before 20140812
-- chose SAE as cloud plateform
-- php-mysql as application backbone
-- codeigniter as application framework
-- bootstrap as front framework
-- application enveronment, database, rewrite config
-- sample page and component
-- login,logout and session controll help
-- auth security, client sha1 submit, server sha1 password save
-- some database structure
-- client module dev in process

# 20140812
use github as source controll system
transfer from xampp to nginx+php+mysql
fix bug of transfer:
--header aready sent(user model file has a space before <?php)
--session uninitaled,use session_destroy after unset_userdata, once is enough






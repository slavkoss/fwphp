<script type="text/javascript" src="event_hndl_cls.js"></script>
    
<script type="text/javascript">

var sadrzajstr = xObject.createElement
( // param. fn cre.html elem.
   { // grupa tagova
       tagName : "div"
      
      ,className : "classOne classTwo"
      
      ,attributes : {
            align : "center"
      }
      
      ,html : "<h2>"+
'<a href="'+
"http://www.mongodb.org"
+'">'
+ "http://www.mongodb.org"
+'</a>'
      +"</h2>"
             
      ,children : 
      [
         {
            tagName : "a",
            html : "<br />"
+ ' 14.8.2014 ' + 'Install MongoDB 2.6.4 on win 8.1.1 64 bit'
+"<br />" 
+'<a href="'+
'http://www.mongodb.org/dr//fastdl.mongodb.org/win32/mongodb-win32-x86_64-2008plus-2.6.4.zip/download' 
+'">'
             +"<i>Download portable zip </i>" 
+'</a>'

+'<a href="'+      
'http://docs.mongodb.org/manual/tutorial/install-mongodb-on-windows/' 
+'">'
+"<i>, Upute za instalaciju</i>" 
+'</a>'
      
         }
        
        ,{
            tagName : "p"

            ,attributes : {
            align : "left"
            }
            
,html : "<i>Ver. 2.2+ does not support Windows XP."
+"<br />"
+"Do not make mongod.exe DB daemon visible on public networks without running in “Secure Mode” with auth setting. MongoDB is designed to be run in trusted environments, and DB does not enable “Secure Mode” by default."
            +"<br />"
            +"<br />"
            + "..."
            +"<br />"
            +"..."
            +"</i>"
            
            +"<br />" +"________________________________"            
        }
        
        ,{
            tagName : "p"

            ,attributes : {
            align : "left"
            }
            
            ,html : 
'<pre>'
+"C:&#92;Windows&#92;system32>wmic os get osarchitecture -> 64-bit"
+"<br />"+
"move: <strong>1. You can run portable MongoDB from any folder</strong>" +'<br />'
+'rename j:&#92;mongodb-win32-x86_64-2008plus-2.6.4 J:&#92;mdb'

+"<br />"+"<strong>*** cd J:&#92;mdb ***</strong>"
+"<br />"+"md data&#92;db <strong>2. moja mapa za podatke nije ispd root mape diska</strong>"


+"<br />"
+"<br />"+"J:&#92;mdb><strong>3. bin&#92;mongo.exe --help </strong>"+'<br />'
+'MongoDB shell version: 2.6.4' + ' usage: '+'<br />'
+'bin&#92;mongo.exe [options] [db address] [file names (ending in .js)]'+'<br />'
+'db address can be:'+'<br />'
+'  foo                   foo DB on local machine'+'<br />'
+'  192.169.0.5/foo       foo DB on 192.168.0.5 machine'+'<br />'
+'  192.169.0.5:9999/foo  foo DB on 192.168.0.5 machine on port 9999'


+"<br />"
+"<br />"+"J:&#92;mdb>bin&#92;mongod.exe"
+" ako je default data dir. (ispod J:),<br />a meni nije, pa:<br /><strong>4. bin&#92;mongod.exe --dbpath j:&#92;mdb&#92;data</strong>"
+"<br />MongoDB starting : <br />pid=6552 port=27017 dbpath=&#92;data 64-bit host=sspc"
+'<br />'
+'journal dir=j:&#92;mdb&#92;data&#92;journal<br />allocating new datafile j:&#92;mdb&#92;data&#92;local.ns, filling with zeroes...'

+'<br />'+'<br />'+ '5. md "log"'
+'<br />'+ 'echo logpath="J:&#92;mdb&#92;log&#92;mongo.log" > "mongod.cfg"'

+'<br />'+'<br />'+ '6. Install MongoDB service<br />"bin&#92;mongod.exe" --config "mongod.cfg" --install'
+'<br />'+ 'To use an alternate dbpath, specify path in config. file <br />(e.g. J:&#92;mdb&#92;mongod.cfg) or on command line with --dbpath option. <br />If dbpath directory does not exist, mongod.exe will not start.'

+'<br />'
+'<br />'+ 'net start MongoDB'
+'<br />'+ 'net stop MongoDB'
+'<br />'+ '"J:&#92;mdb&#92;bin&#92;mongod.exe" --remove'
+'<br />'+ 'bin&#92;sc.exe delete MongoDB'



+'</pre>'
        }
        
        ,{
            tagName : "p"

            ,html : "Text4 PODNOŽJE"
            +"<br />"
            + " mmmm nnnnn"
            
        }
        
      ] // kraj podgrupe djeca
   } // kraj grupa tagova
); // kraj param. fn cre.html elem.  
// kraj punjenja  v a r  s a d r z a j  s t r

document.body.appendChild(sadrzajstr);

</script>
/**
 * MyPHP Client. 
 * @author Amadi ifeanyi
 * @repo https://github.com/amadiify/MyPHP
 */

;function MyPHP()
{
    this.auth = null;
    this.callback = [];
    this.opened = true;
    this.classBuilder = Object.create(null);
    this.url = $url; // You can change this

    // private http object
    var HTTP = function(){
        
        "use strict";

        this.connect = function(){
            var http = "";
            if(window.ActiveXObject)
            {
                http = new ActiveXObject("XMLHTTP.Microsoft");
            }
            else
            {
                http = new XMLHttpRequest();
            }

            return http;
        };

        this.post = function(){
            "use strict";

            let p = arguments[0];
            let post = arguments[1];

            var callback = arguments[2] || false;

            var xhr = this.connect();
            var params = p;
            var data = [];
            data['data'] = null;

            xhr.open("POST", params, true);
            xhr.setRequestHeader("content-type", "application/form-encoded");

            if (this.header != null)
            {
                for (var x in this.header)
                {
                    xhr.setRequestHeader(x, this.header[x]);
                }
            }

            xhr.onreadystatechange = function()
            {
                if(xhr.readyState == 2 || xhr.readyState == 4)
                {
                    if(xhr.readyState == 4)
                    {  
                        
                        data['text'] = xhr.responseText;
                        data['status'] = xhr.status;
                        data['url'] = xhr.responseURL;

                        var type = xhr.response.substring(0,1);

                        if(type == "{" || xhr.response.substring(0,2) == '[{')
                        {
                            data['data'] = JSON.parse(xhr.response);
                        }
                        else
                        {
                            data['data'] = xhr.response;
                        }

                        if(callback !== false)
                        {
                            let _data = data;
                            let __data = {data : _data.data, text : _data.text, status : _data.status, url : _data.url};
                            callback.call(this, __data);
                            _data = null; __data = null;
                        }
                    }
                }
            };

            xhr.send(post);


            if(callback == false)
            {
                var then = setInterval(function(){
                    if(data.data != null)
                    {
                        clearInterval(then);
                        this.data = data;
                        data = null;
                    }
                },100);
            }

            return this;
        };
    };

    // creates a new php class object
    this.fromClass = function()
    {
        let args = arguments;
        let app = new MyPHP();
        app.opened = false;
        app.auth = this.auth;

        let name = args[0];

        app.classBuilder.class = name;

        var argument = [];
        [].forEach.call(args, (e,i)=>{
            if (i > 0)
            {
                argument.push(e);
            }
        });

        var _args = JSON.stringify({"data":argument});
        app.classBuilder.classArgs = _args;
        app.classBuilder.method = [];
        app.classBuilder.methodArgs = [];

        return app;
    };

    // access a public static method
    this.staticMethod = function()
    {
        let args = arguments;
        let name = args[0];
        this.classBuilder.staticMethod = name;

        var argument = [];
        [].forEach.call(args, (e,i)=>{
            if (i > 0)
            {
                argument.push(e);
            }
        });

        var _args = JSON.stringify({"data":argument});
        this.classBuilder.staticMethodArgs = _args;

        return this;
    };

    // acesss a public non static method
    this.method = function()
    {
        let args = arguments;
        let name = args[0];

        this.classBuilder.method.push(name)

        var argument = [];
        [].forEach.call(args, (e,i)=>{
            if (i > 0)
            {
                argument.push(e);
            }
        });

        var _args = JSON.stringify({"data":argument});
        this.classBuilder.methodArgs.push(_args);

        return this;
    };

    // extablish connection and returns a promise
    // call php functions with params (optional)
    this.call = function()
    {
        if (this.opened)
        {
            let args = arguments;
            let func = args[0];
            let data = new FormData();

            var argument = [];
            [].forEach.call(args, (e,i)=>{
                if (i > 0)
                {
                    argument.push(e);
                }
            });

            var _args = JSON.stringify({"data":argument});

            var cnt = true;

            if (typeof func == 'object')
            {
                if ('classBuilder' in func)
                {
                    cnt = false;
                    data.append('class', JSON.stringify(func.classBuilder));
                }
            }
            
            if (cnt)
            {
                data.append('function', func);
                data.append('arguments', _args);
            }

            const http = new HTTP;

            http.post(this.url + '?4d5be6954a37f1076eb6d698fbce26c2&auth='+this.auth, data, function(res){
                if ('response' in res.data)
                {
                    this.callback.call(this, res.data.response);
                }
                else
                {
                    this.callback.call(this, 'An error occured. Operation failed with status code 0');
                }
            }.bind(this));

            return this;
        }
        else
        {
           
            let args = arguments;
            let name = args[0];
            this.classBuilder.call = name;

            var argument = [];
            [].forEach.call(args, (e,i)=>{
                if (i > 0)
                {
                    argument.push(e);
                }
            });

            var _args = JSON.stringify({"data":argument});
            this.classBuilder.callArgs = _args;
            this.opened = true;
            return this;

        }

    };

    // listen for promise.
    this.then = function()
    {
        let callback = arguments[0];
        this.callback = callback;
    };

    // Additional function to add html response doc to current dom
    this.html = function()
    {
        let html = arguments[0];

        var body = document.body;

        if (!body.hasAttribute('data-html-wrapper-for-php'))
        {   
            let htmldoc = document.querySelector('html');
            
            body.setAttribute('data-html-wrapper-for-php', true);

            var scripts = document.getElementsByTagName('script');
            var lastScript = scripts[scripts.length-1];
            lastScript.insertAdjacentHTML("beforebegin", html);

            document.write("<!DOCTYPE html>\n"+ htmldoc.outerHTML);
            document.close();

            setTimeout(()=>{
                document.body.removeAttribute('data-html-wrapper-for-php');
            },1000);
        }
    };
}

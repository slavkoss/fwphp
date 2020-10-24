[SimpleAjax](http://www.freelancephp.net/simpleajax-small-ajax-javascript-object/) - JavaScript Object
======================================================================================================

SimpleAjax is a very small Ajax Javascript object (~2.4kb min).


How To Use?
-----------

Some examples:

	Ajax.call({
		url: 'ajax.html',
		type: 'GET',
		success: function (data) {
			alert(data);
		}
	});


	Ajax.get('ajax.html', function (data) {
		alert(data);
	});

	Ajax.post('ajax.html', {val: 'test'}, function (data) {
		alert(data);
	});


API
---

* `Ajax.call( options )`
* `Ajax.get( url, [data], [success] )`
* `Ajax.post( url, [data], [success] )`
* `Ajax.load( el, url, [data], [complete] )`
* `Ajax.param( obj )`
* `Ajax.parseJSON( data )`
* `Ajax.trim( str )`
* `Ajax.isFunction( obj )`


Browser Support
---------------

Tested on IE6+, FF, Opera, Chrome and Safari (for Windows).


License
-------

Released under MIT license.


Questions?
----------

If you have any questions, please ask them by using [this contactform](http://www.freelancephp.net/contact).

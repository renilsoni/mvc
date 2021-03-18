var Base = function() {

};

Base.prototype = {
	alert : function() 
	{
	
	},
	url : null,
	method : 'POST',
	params : {},

	setUrl : function(url) {
		this.url = url;
		return this;
	},
	getUrl : function() {
		return this.url;
	},
	setMethod : function(method) {
		this.method = method;
		return this;
	},
	getMethod : function() {
		return this.method;
	},
	setParams : function(params) {
		this.params = params;
		return this;
	},
	getParams : function(key) {
		if (typeof key === 'undefined') {
			return this.params;
		}
		if (typeof this.params[key] == 'undefined') {
			return null;
		}
		return this.params[key];
	},
	addParam : function(key,value) {
		this.params[key] = value;
		return this;
	},
	removeParam : function(key) {
		if (typeof this.params[key] != undefined) {
			delete this.params[key];
		}
		return this;
	},
	resetParams : function() {
		this.params = {};
		return this;
	},
	setForm : function(form) {
		console.log(form);
	},

	load : function() {
		jQuery.ajax({
			url : this.getUrl(),
			method : this.getMethod(),
			data : this.getParams(),
			success : function(response) {
				jQuery.each(response.elements,function(i,elements){
					jQuery(elements.selector).html(elements.html);
				}) 
				// console.log(response);
			}
		})
	},

	upload : function() {
		jQuery.ajax({
			url : this.getUrl(),
			method : this.getMethod(),
			data : this.getParams(),
			processData : false,
			contentType : false,
			success : function(response) {
				jQuery.each(response.elements,function(i,elements){
					jQuery(elements.selector).html(elements.html);
				}) 
				// console.log(response);
			}
		})
	}
};

var object = new Base();


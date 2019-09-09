"use strict";

var serviceImgPath;
$(function () {
	serviceImgPath = $('serviceImgPath').attr('data');
	$(window).resize(resizeImages)
});

function resizeImages() {
	$('.card-image > .img').each(function(){
		var element = $(this)
		var size = element.width();

		var index = parseInt(element.attr("data-index"));
		var fullsize = size * 10;
		var x = index % 10 * size;
		var y = Math.floor(index / 10) * size;

		element.css({
			'height': size+'px',
			"background-image": "url(" + serviceImgPath + "/results.png)",
			"background-size": fullsize + "px " + fullsize + "px",
			"background-position": "-" + x + "px -" + y + "px"
		});
	});
}

function getImage(index, serviceImgPath, size) {
	var fullsize = size * 10;
	var x = index % 10 * size;
	var y = Math.floor(index / 10) * size;
	return "background-image: url(" + serviceImgPath + "/results.png);" + "background-size: " + fullsize + "px " + fullsize + "px;" + "background-position: -" + x + "px -" + y + "px;";
}

// POLYFILL

function _typeof(obj) {
	if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
		_typeof = function _typeof(obj) {
			return typeof obj;
		};
	} else {
		_typeof = function _typeof(obj) {
			return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
		};
	}
	return _typeof(obj);
}

if (!Object.keys) {
	Object.keys = function () {
		'use strict';

		var hasOwnProperty = Object.prototype.hasOwnProperty,
			hasDontEnumBug = !{
				toString: null
			}.propertyIsEnumerable('toString'),
			dontEnums = ['toString', 'toLocaleString', 'valueOf', 'hasOwnProperty', 'isPrototypeOf', 'propertyIsEnumerable', 'constructor'],
			dontEnumsLength = dontEnums.length;
		return function (obj) {
			if (_typeof(obj) !== 'object' && (typeof obj !== 'function' || obj === null)) {
				throw new TypeError('Object.keys called on non-object');
			}

			var result = [],
				prop,
				i;

			for (prop in obj) {
				if (hasOwnProperty.call(obj, prop)) {
					result.push(prop);
				}
			}

			if (hasDontEnumBug) {
				for (i = 0; i < dontEnumsLength; i++) {
					if (hasOwnProperty.call(obj, dontEnums[i])) {
						result.push(dontEnums[i]);
					}
				}
			}

			return result;
		};
	}
}
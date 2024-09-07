/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/Offers-And-Needs.js":
/*!*****************************************!*\
  !*** ./src/modules/Offers-And-Needs.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class OffersAndNeeds {
  constructor() {
    this.links = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.tomc-community-offers-and-needs-link');
    this.postNeedSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-post-need');
    this.addNeedOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-add-need-overlay');
    this.addNeedOverlayCloseButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-add-need-overlay-close');
    this.addNeedBody = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-add-event-overlay-body');
    this.addNeedContinue = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-add-need-continue');
    this.addNeedTitleInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-new-need-title');
    this.noTitleError = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-add-event-no-title-error');
    this.events();
    this.needTitle;
  }
  events() {
    this.links.on('click', this.animateSpan.bind(this));
    this.postNeedSpan.on('click', this.openAddNeedOverlay.bind(this));
    this.addNeedOverlayCloseButton.on('click', this.closeAddNeedOverlay.bind(this));
    this.addNeedContinue.on('click', this.setTitle.bind(this));
  }
  animateSpan(e) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('contracting');
  }
  openAddNeedOverlay(e) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('contracting');
    this.addNeedOverlay.removeClass('hidden');
    this.addNeedOverlay.addClass('search-overlay--active');
  }
  closeAddNeedOverlay() {
    this.addNeedBody.html('');
    this.addNeedOverlay.removeClass('search-overlay--active');
    this.addNeedOverlay.addClass('hidden');
  }
  setTitle() {
    if (this.addNeedTitleInput.val() != '') {
      this.noTitleError.addClass('hidden');
      this.needTitle = this.addNeedTitleInput.val();
      console.log(this.needTitle);
    } else {
      this.noTitleError.removeClass('hidden');
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (OffersAndNeeds);

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["jQuery"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_Offers_And_Needs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/Offers-And-Needs */ "./src/modules/Offers-And-Needs.js");

const tomcOffersAndNeeds = new _modules_Offers_And_Needs__WEBPACK_IMPORTED_MODULE_0__["default"]();
/******/ })()
;
//# sourceMappingURL=index.js.map
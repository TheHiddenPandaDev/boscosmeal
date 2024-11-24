/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};

;// CONCATENATED MODULE: external ["wp","hooks"]
const external_wp_hooks_namespaceObject = window["wp"]["hooks"];
;// CONCATENATED MODULE: external ["wp","i18n"]
const external_wp_i18n_namespaceObject = window["wp"]["i18n"];
;// CONCATENATED MODULE: external ["wp","element"]
const external_wp_element_namespaceObject = window["wp"]["element"];
;// CONCATENATED MODULE: ./resources/js/admin/product-tutorial/index.js
/**
 * External dependencies
 */



(0,external_wp_hooks_namespaceObject.addFilter)('experimental_woocommerce_admin_product_tour_steps', 'woocommerce-composite-products', (tourSteps, tourType) => {
  if ('composite-products' !== tourType) {
    return tourSteps;
  }
  const steps = [{
    referenceElements: {
      desktop: '._regular_price_field'
    },
    focusElement: {
      desktop: '#_regular_price'
    },
    meta: {
      name: 'composite-product-price',
      heading: (0,external_wp_i18n_namespaceObject.__)('Assign a base price to your Composite', 'woocommerce-composite-products'),
      descriptions: {
        desktop: (0,external_wp_element_namespaceObject.createInterpolateElement)((0,external_wp_i18n_namespaceObject.__)('Use these fields to define a base price for your Composite. This can be handy, for example if you do not plan to offer any options that affect its price. If you prefer to <link>preserve the prices of individual Components</link>, you may omit this step.', 'woocommerce-composite-products'), {
          link: (0,external_wp_element_namespaceObject.createElement)('a', {
            href: 'https://woocommerce.com/document/composite-products/composite-products-configuration/#pricing',
            'aria-label': (0,external_wp_i18n_namespaceObject.__)('Composite Products configuration documentation.', 'woocommerce-composite-products'),
            target: '_blank'
          })
        })
      }
    }
  }, {
    referenceElements: {
      desktop: '.product_data .cp_components_tab'
    },
    meta: {
      name: 'add-components',
      heading: (0,external_wp_i18n_namespaceObject.__)('Add Components and options', 'woocommerce-composite-products'),
      descriptions: {
        desktop: (0,external_wp_element_namespaceObject.createInterpolateElement)((0,external_wp_i18n_namespaceObject.__)('Components are the building blocks of a Composite Product. You can utilize existing Simple or Variable products as Component options - or even add entire <link>Bundles</link> or product categories. Every Component reveals its own <link2>pricing, shipping and display options</link2> to configure.', 'woocommerce-composite-products'), {
          link: (0,external_wp_element_namespaceObject.createElement)('a', {
            href: 'https://woocommerce.com/products/product-bundles/',
            'aria-label': (0,external_wp_i18n_namespaceObject.__)('Product Bundles product page.', 'woocommerce-composite-products'),
            target: '_blank'
          }),
          link2: (0,external_wp_element_namespaceObject.createElement)('a', {
            href: 'https://woocommerce.com/document/composite-products/composite-products-configuration/#component-settings',
            'aria-label': (0,external_wp_i18n_namespaceObject.__)('Composite Products configuration documentation.', 'woocommerce-composite-products'),
            target: '_blank'
          })
        })
      }
    }
  }, {
    referenceElements: {
      desktop: '.product_data .shipping_tab'
    },
    meta: {
      name: 'shipping-options',
      heading: (0,external_wp_i18n_namespaceObject.__)('Configure shipping options', 'woocommerce-composite-products'),
      descriptions: {
        desktop: (0,external_wp_i18n_namespaceObject.__)('Assembled Composites have their own dimensions and weight: Choose the Assembled option if the items contained in your product kit are physically assembled in a common container. Unassembled Composites do not have any shipping options to configure: Choose the Unassembled option if the items of your product kit are shipped in their existing packaging.', 'woocommerce-composite-products')
      }
    }
  }];
  return steps;
});
/******/ })()
;
module.exports = [
    {
        name: 'common',
        modules: {
            FormData: 'FormData',
            'Magento_Captcha/js/action/refresh':
                'Magento_Captcha/js/action/refresh',
            'Magento_Captcha/js/model/captcha':
                'Magento_Captcha/js/model/captcha',
            'Magento_Captcha/js/model/captchaList':
                'Magento_Captcha/js/model/captchaList',
            'Magento_Captcha/js/view/checkout/defaultCaptcha':
                'Magento_Captcha/js/view/checkout/defaultCaptcha',
            'Magento_Captcha/js/view/checkout/loginCaptcha':
                'Magento_Captcha/js/view/checkout/loginCaptcha',
            'Magento_Catalog/js/price-box': 'Magento_Catalog/js/price-box',
            'Magento_Catalog/js/price-utils': 'Magento_Catalog/js/price-utils',
            'Magento_Catalog/js/product/query-builder':
                'Magento_Catalog/js/product/query-builder',
            'Magento_Catalog/js/product/storage/data-storage':
                'Magento_Catalog/js/product/storage/data-storage',
            'Magento_Catalog/js/product/storage/ids-storage':
                'Magento_Catalog/js/product/storage/ids-storage',
            'Magento_Catalog/js/product/storage/ids-storage-compare':
                'Magento_Catalog/js/product/storage/ids-storage-compare',
            'Magento_Catalog/js/product/storage/storage-service':
                'Magento_Catalog/js/product/storage/storage-service',
            'Magento_Catalog/js/storage-manager':
                'Magento_Catalog/js/storage-manager',
            'Magento_Catalog/js/view/compare-products':
                'Magento_Catalog/js/view/compare-products',
            'Magento_Catalog/js/view/image': 'Magento_Catalog/js/view/image',
            'Magento_Checkout/js/sidebar': 'Magento_Checkout/js/sidebar',
            'Magento_Checkout/js/view/minicart':
                'Magento_Checkout/js/view/minicart',
            'Magento_Customer/js/action/login':
                'Magento_Customer/js/action/login',
            'Magento_Customer/js/customer-data':
                'Magento_Customer/js/customer-data',
            'Magento_Customer/js/invalidation-processor':
                'Magento_Customer/js/invalidation-processor',
            'Magento_Customer/js/invalidation-rules/website-rule':
                'Magento_Customer/js/invalidation-rules/website-rule',
            'Magento_Customer/js/model/authentication-popup':
                'Magento_Customer/js/model/authentication-popup',
            'Magento_Customer/js/section-config':
                'Magento_Customer/js/section-config',
            'Magento_Customer/js/view/authentication-popup':
                'Magento_Customer/js/view/authentication-popup',
            'Magento_Customer/js/view/customer':
                'Magento_Customer/js/view/customer',
            'Magento_Msrp/js/view/checkout/minicart/subtotal/totals':
                'Magento_Msrp/js/view/checkout/minicart/subtotal/totals',
            'Magento_PageCache/js/page-cache':
                'Magento_PageCache/js/page-cache',
            'Magento_Persistent/js/view/customer-data-mixin':
                'Magento_Persistent/js/view/customer-data-mixin',
            'Magento_Search/js/form-mini': 'Magento_Search/js/form-mini',
            'Magento_Swatches/js/swatch-renderer':
                'Magento_Swatches/js/swatch-renderer',
            'Magento_Tax/js/view/checkout/minicart/subtotal/totals':
                'Magento_Tax/js/view/checkout/minicart/subtotal/totals',
            'Magento_Theme/js/cookie-status': 'Magento_Theme/js/cookie-status',
            'Magento_Theme/js/responsive': 'Magento_Theme/js/responsive',
            'Magento_Theme/js/theme': 'Magento_Theme/js/theme',
            'Magento_Theme/js/view/messages': 'Magento_Theme/js/view/messages',
            'Magento_Translation/js/mage-translation-dictionary':
                'Magento_Translation/js/mage-translation-dictionary',

            'Magento_PageCache/js/form-key-provider':
                'Magento_PageCache/js/form-key-provider',

            'Magento_Ui/js/block-loader': 'Magento_Ui/js/block-loader',
            'Magento_Ui/js/core/app': 'Magento_Ui/js/core/app',
            'Magento_Ui/js/core/renderer/layout':
                'Magento_Ui/js/core/renderer/layout',
            'Magento_Ui/js/core/renderer/types':
                'Magento_Ui/js/core/renderer/types',
            'Magento_Ui/js/form/adapter': 'Magento_Ui/js/form/adapter',
            'Magento_Ui/js/form/adapter/buttons':
                'Magento_Ui/js/form/adapter/buttons',
            'Magento_Ui/js/form/form': 'Magento_Ui/js/form/form',
            'Magento_Ui/js/lib/core/class': 'Magento_Ui/js/lib/core/class',
            'Magento_Ui/js/lib/core/collection':
                'Magento_Ui/js/lib/core/collection',
            'Magento_Ui/js/lib/core/element/element':
                'Magento_Ui/js/lib/core/element/element',
            'Magento_Ui/js/lib/core/element/links':
                'Magento_Ui/js/lib/core/element/links',
            'Magento_Ui/js/lib/core/events': 'Magento_Ui/js/lib/core/events',
            'Magento_Ui/js/lib/core/storage/local':
                'Magento_Ui/js/lib/core/storage/local',
            'Magento_Ui/js/lib/key-codes': 'Magento_Ui/js/lib/key-codes',
            'Magento_Ui/js/lib/knockout/bindings/after-render':
                'Magento_Ui/js/lib/knockout/bindings/after-render',
            'Magento_Ui/js/lib/knockout/bindings/autoselect':
                'Magento_Ui/js/lib/knockout/bindings/autoselect',
            'Magento_Ui/js/lib/knockout/bindings/bind-html':
                'Magento_Ui/js/lib/knockout/bindings/bind-html',
            'Magento_Ui/js/lib/knockout/bindings/bootstrap':
                'Magento_Ui/js/lib/knockout/bindings/bootstrap',
            'Magento_Ui/js/lib/knockout/bindings/collapsible':
                'Magento_Ui/js/lib/knockout/bindings/collapsible',
            'Magento_Ui/js/lib/knockout/bindings/color-picker':
                'Magento_Ui/js/lib/knockout/bindings/color-picker',
            'Magento_Ui/js/lib/knockout/bindings/datepicker':
                'Magento_Ui/js/lib/knockout/bindings/datepicker',
            'Magento_Ui/js/lib/knockout/bindings/fadeVisible':
                'Magento_Ui/js/lib/knockout/bindings/fadeVisible',
            'Magento_Ui/js/lib/knockout/bindings/i18n':
                'Magento_Ui/js/lib/knockout/bindings/i18n',
            'Magento_Ui/js/lib/knockout/bindings/keyboard':
                'Magento_Ui/js/lib/knockout/bindings/keyboard',
            'Magento_Ui/js/lib/knockout/bindings/mage-init':
                'Magento_Ui/js/lib/knockout/bindings/mage-init',
            'Magento_Ui/js/lib/knockout/bindings/optgroup':
                'Magento_Ui/js/lib/knockout/bindings/optgroup',
            'Magento_Ui/js/lib/knockout/bindings/outer_click':
                'Magento_Ui/js/lib/knockout/bindings/outer_click',
            'Magento_Ui/js/lib/knockout/bindings/range':
                'Magento_Ui/js/lib/knockout/bindings/range',
            'Magento_Ui/js/lib/knockout/bindings/resizable':
                'Magento_Ui/js/lib/knockout/bindings/resizable',
            'Magento_Ui/js/lib/knockout/bindings/scope':
                'Magento_Ui/js/lib/knockout/bindings/scope',
            'Magento_Ui/js/lib/knockout/bindings/simple-checked':
                'Magento_Ui/js/lib/knockout/bindings/simple-checked',
            'Magento_Ui/js/lib/knockout/bindings/staticChecked':
                'Magento_Ui/js/lib/knockout/bindings/staticChecked',
            'Magento_Ui/js/lib/knockout/bindings/tooltip':
                'Magento_Ui/js/lib/knockout/bindings/tooltip',
            'Magento_Ui/js/lib/knockout/bootstrap':
                'Magento_Ui/js/lib/knockout/bootstrap',
            'Magento_Ui/js/lib/knockout/extender/bound-nodes':
                'Magento_Ui/js/lib/knockout/extender/bound-nodes',
            'Magento_Ui/js/lib/knockout/extender/observable_array':
                'Magento_Ui/js/lib/knockout/extender/observable_array',
            'Magento_Ui/js/lib/knockout/template/engine':
                'Magento_Ui/js/lib/knockout/template/engine',
            'Magento_Ui/js/lib/knockout/template/loader':
                'Magento_Ui/js/lib/knockout/template/loader',
            'Magento_Ui/js/lib/knockout/template/observable_source':
                'Magento_Ui/js/lib/knockout/template/observable_source',
            'Magento_Ui/js/lib/knockout/template/renderer':
                'Magento_Ui/js/lib/knockout/template/renderer',
            'Magento_Ui/js/lib/logger/console-logger':
                'Magento_Ui/js/lib/logger/console-logger',
            'Magento_Ui/js/lib/logger/console-output-handler':
                'Magento_Ui/js/lib/logger/console-output-handler',
            'Magento_Ui/js/lib/logger/entry': 'Magento_Ui/js/lib/logger/entry',
            'Magento_Ui/js/lib/logger/entry-factory':
                'Magento_Ui/js/lib/logger/entry-factory',
            'Magento_Ui/js/lib/logger/formatter':
                'Magento_Ui/js/lib/logger/formatter',
            'Magento_Ui/js/lib/logger/levels-pool':
                'Magento_Ui/js/lib/logger/levels-pool',
            'Magento_Ui/js/lib/logger/logger':
                'Magento_Ui/js/lib/logger/logger',
            'Magento_Ui/js/lib/logger/logger-utils':
                'Magento_Ui/js/lib/logger/logger-utils',
            'Magento_Ui/js/lib/logger/message-pool':
                'Magento_Ui/js/lib/logger/message-pool',
            'Magento_Ui/js/lib/registry/registry':
                'Magento_Ui/js/lib/registry/registry',
            'Magento_Ui/js/lib/spinner': 'Magento_Ui/js/lib/spinner',
            'Magento_Ui/js/lib/view/utils/async':
                'Magento_Ui/js/lib/view/utils/async',
            'Magento_Ui/js/lib/view/utils/bindings':
                'Magento_Ui/js/lib/view/utils/bindings',
            'Magento_Ui/js/lib/view/utils/dom-observer':
                'Magento_Ui/js/lib/view/utils/dom-observer',
            'Magento_Ui/js/modal/alert': 'Magento_Ui/js/modal/alert',
            'Magento_Ui/js/modal/confirm': 'Magento_Ui/js/modal/confirm',
            'Magento_Ui/js/modal/modal': 'Magento_Ui/js/modal/modal',
            'Magento_Ui/js/model/messageList':
                'Magento_Ui/js/model/messageList',
            'Magento_Ui/js/model/messages': 'Magento_Ui/js/model/messages',
            'Magento_Ui/js/view/messages': 'Magento_Ui/js/view/messages',
            MutationObserver: 'MutationObserver',
            domReady: 'requirejs/domReady',
            'es6-collections': 'es6-collections',
            jquery: 'jquery',
            'jquery-ui-modules/button': 'jquery/ui-modules/button',
            'jquery-ui-modules/core': 'jquery/ui-modules/core',
            'jquery-ui-modules/datepicker': 'jquery/ui-modules/datepicker',
            'jquery-ui-modules/dialog': 'jquery/ui-modules/dialog',
            'jquery-ui-modules/draggable': 'jquery/ui-modules/draggable',
            'jquery-ui-modules/effect': 'jquery/ui-modules/effect',
            'jquery-ui-modules/effect-blind': 'jquery/ui-modules/effect-blind',
            'jquery-ui-modules/effect-fade': 'jquery/ui-modules/effect-fade',
            'jquery-ui-modules/menu': 'jquery/ui-modules/menu',
            'jquery-ui-modules/mouse': 'jquery/ui-modules/mouse',
            'jquery-ui-modules/position': 'jquery/ui-modules/position',
            'jquery-ui-modules/resizable': 'jquery/ui-modules/resizable',
            'jquery-ui-modules/slider': 'jquery/ui-modules/slider',
            'jquery-ui-modules/timepicker': 'jquery/ui-modules/timepicker',
            'jquery-ui-modules/widget': 'jquery/ui-modules/widget',
            'jquery/jquery-migrate': 'jquery/jquery-migrate',
            'jquery/jquery-storageapi':
                'Magento_Cookie/js/jquery.storageapi.extended',
            'jquery/jquery.cookie': 'jquery/jquery.cookie',
            'jquery/jquery.metadata': 'jquery/jquery.metadata',
            'jquery/jquery.mobile.custom': 'jquery/jquery.mobile.custom',
            'jquery/jquery.parsequery': 'jquery/jquery.parsequery',
            'jquery/jquery.storageapi.min': 'jquery/jquery.storageapi.min',
            'jquery/patches/jquery': 'jquery/patches/jquery',
            'jquery/patches/jquery-ui': 'jquery/patches/jquery-ui',
            'jquery/validate': 'jquery/jquery.validate',
            'knockoutjs/knockout': 'knockoutjs/knockout',
            'knockoutjs/knockout-es5': 'knockoutjs/knockout-es5',
            'knockoutjs/knockout-fast-foreach':
                'knockoutjs/knockout-fast-foreach',
            'knockoutjs/knockout-repeat': 'knockoutjs/knockout-repeat',
            'mage/apply/main': 'mage/apply/main',
            'mage/apply/scripts': 'mage/apply/scripts',
            'mage/bootstrap': 'mage/bootstrap',
            'mage/calendar': 'mage/calendar',
            'mage/collapsible': 'mage/collapsible',
            'mage/common': 'mage/common',
            'mage/cookies': 'mage/cookies',
            'mage/dataPost': 'mage/dataPost',
            'mage/decorate': 'mage/decorate',
            'mage/dropdown': 'mage/dropdown',
            'mage/dropdowns': 'mage/dropdowns',
            'mage/ie-class-fixer': 'mage/ie-class-fixer',
            'mage/loader': 'mage/loader',
            'mage/mage': 'mage/mage',
            'mage/menu': 'mage/menu',
            'mage/requirejs/resolver': 'mage/requirejs/resolver',
            'mage/smart-keyboard-handler': 'mage/smart-keyboard-handler',
            'mage/storage': 'mage/storage',
            'mage/tabs': 'mage/tabs',
            'mage/template': 'mage/template',
            'mage/translate': 'mage/translate',
            'mage/translate-inline': 'mage/translate-inline',
            'mage/trim-input': 'mage/trim-input',
            'mage/url': 'mage/url',
            'mage/utils/arrays': 'mage/utils/arrays',
            'mage/utils/compare': 'mage/utils/compare',
            'mage/utils/main': 'mage/utils/main',
            'mage/utils/misc': 'mage/utils/misc',
            'mage/utils/objects': 'mage/utils/objects',
            'mage/utils/strings': 'mage/utils/strings',
            'mage/utils/template': 'mage/utils/template',
            'mage/utils/wrapper': 'mage/utils/wrapper',
            'mage/validation': 'mage/validation',
            'mage/validation/validation': 'mage/validation/validation',
            matchMedia: 'matchMedia',
            moment: 'moment',
            spectrum: 'jquery/spectrum/spectrum',
            text: 'mage/requirejs/text',
            'text!Magento_Captcha/template/checkout/captcha.html':
                'Magento_Captcha/template/checkout/captcha.html',
            'text!Magento_Checkout/template/minicart/content.html':
                'Magento_Checkout/template/minicart/content.html',
            'text!Magento_Customer/template/authentication-popup.html':
                'Magento_Customer/template/authentication-popup.html',
            'text!Magento_Ui/template/messages.html':
                'Magento_Ui/template/messages.html',
            'text!js-translation.json': 'js-translation.json',
            'text!ui/template/block-loader.html':
                'Magento_Ui/templates/block-loader.html',
            'text!ui/template/collection.html':
                'Magento_Ui/templates/collection.html',
            'text!ui/template/modal/modal-custom.html':
                'Magento_Ui/templates/modal/modal-custom.html',
            'text!ui/template/modal/modal-popup.html':
                'Magento_Ui/templates/modal/modal-popup.html',
            'text!ui/template/modal/modal-slide.html':
                'Magento_Ui/templates/modal/modal-slide.html',
            'text!ui/template/tooltip/tooltip.html':
                'Magento_Ui/templates/tooltip/tooltip.html',
            tinycolor: 'jquery/spectrum/tinycolor',
            underscore: 'underscore',

            'js/theme': 'js/theme',
            'mage/backend/bootstrap': 'mage/backend/bootstrap',
            'mage/adminhtml/globals': 'mage/adminhtml/globals',
            'Magento_Catalog/catalog/product':
                'Magento_Catalog/catalog/product',
            'jquery/jquery-ui': 'jquery/jquery-ui',
            'js-cookie/cookie-wrapper': 'js-cookie/cookie-wrapper',
            'text!Magento_Catalog/template/grid/cells/preserved.html':
                'Magento_Catalog/template/grid/cells/preserved.html'

        },
    }
];

;
(function ($, window, document, undefined) {
    // Create the defaults once
    var pluginName = "MySelectize",
        defaults = {};

    // The actual plugin constructor
    function MySelectize(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.selectOptions = '';
        this.inputTags = '';
        this.control = '';
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend(MySelectize.prototype, {
        init: function () {
            this.storeRefreshedSelectOptions();
            this.makeSelectize();
        },
        makeSelectize: function () {
            var self = this;
            this.inputTags = $(this.element).selectize({
                plugins: ['remove_button'],
                valueField: 'iId',
                labelField: 'sName',
                searchField: 'sName',
                delimiter: ',',
                hideSelected: true,
                persist: false,
                create: $.proxy(this.selectizeCreate, this),
                load: $.proxy(this.selectizeLoad, this),
                render: {
                    option_create: function (data, escape) {
                        return '<div class="create">' + addTag + ' <strong>"' + escape(data.input) + '"</strong>&hellip;</div>';
                    }
                },
                onItemAdd: function () {
                    self.control.close();
                }
            });
            this.control = this.inputTags[0].selectize;
        },
        selectizeCreate: function (input) {
            this.addTag(input);
            return {
                value: input,
                text: input
            }
        },
        selectizeLoad: function (query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: baseurl + this.settings.findUri + query,
                type: 'GET',
                dataType: 'json',
                error: function () {
                    callback();
                },
                success: function (res) {
                    callback(res.data);
                }
            });
        },
        addTag: function (tagName) {
            $.ajax({
                url: baseurl + this.settings.createUri + tagName,
                type: 'GET',
                dataType: 'json',
                error: function () {
                },
                success: $.proxy(this.addTagSuccess, this)
            });
        },
        addTagSuccess: function (res) {
            this.control.addOption({
                iId: res.data.iId,
                sName: res.data.sName
            });
            this.storeRefreshedSelectOptions();
            this.selectOptions.push(res.data.iId);
            this.control.setValue(this.selectOptions);
            $(this.element).parent().find('input[type=text]').val('');
        },
        storeRefreshedSelectOptions: function () {
            this.storeSelectOptions(this.getRefreshedSelectOptions());
        },
        getRefreshedSelectOptions: function () {
            return $.map($(this.element).find('option'), function (option) {
                return parseInt(option.value, 10);
            });
        },
        storeSelectOptions: function (selectOptions) {
            this.selectOptions = selectOptions;
        }
    });

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new MySelectize(this, options));
            }
        });
        return this;
    };

})(jQuery, window, document);
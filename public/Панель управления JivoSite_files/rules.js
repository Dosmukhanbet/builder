var RULE_TYPES;
var Condition;
var Command;
var RULE_CONDITIONS;
var RULE_COMPARATORS;
var RULE_COMMANDS;
var Rule;
var BaseView;
var ConditionView;
var ConditionSimpleView;
var ConditionBooleanView;
var ConditionWithComparator;
var ConditionTextView;
var ConditionTextWithLabelView;
var ConditionListView;
var ConditionOnlineView;
var ConditionTimeOnSiteView;
var ConditionTimeOnPageView;
var ConditionTimeAfterCloseView;
var ConditionTimeAfterFirstMessageView;
var ConditionTimeAfterInvitationView;
var ConditionNumberOfVisitsView;
var ConditionGoalScrollView;
var ConditionGoalCloseView;
var ConditionCityView;
var ConditionCountryView;
var ConditionHourView;
var ConditionPageTitleView;
var ConditionPageUrlView;
var ConditionPagesCountView;
var ConditionWeekDayView;
var ConditionAbTestGroupView;
var CommandView;
var CommandHideView;
var CommandWithMessageView;
var CommandProactiveView;
var CommandSystemMessageView;
var CommandSystemMessageEmailView;
var CommandOpenOfflineView;
var CommandShowCallformView;
var Conditions;
var Commands;
var RuleFormView;
var Rules;
var RuleListView;
var cities;
var deletePopup;
var ruleToRemoveIndex;
var updateJsonRulesPopup;

$(document).ready(function() {
    RULE_TYPES = {
        any: l8n('autoActions.type.any'),
        all: l8n('autoActions.type.all')
    }

    Condition = Backbone.Model.extend({
        defaults: {
            condition: 'online',
            value: true
        },
        getClassName: function () {
            return this.get('condition').split('_').map(function (val) {
                return val.charAt(0).toUpperCase() + val.slice(1);
            }).join('');
        },
        valid: function () {
            return this.view.valid();
        }
    });

    Command = Backbone.Model.extend({
        defaults: {
            command: 'open'
        },
        getClassName: function () {
            return this.get('command').split('_').map(function (val) {
                return val.charAt(0).toUpperCase() + val.slice(1);
            }).join('');
        },
        valid: function () {
            return this.view.valid();
        }
    });

    RULE_CONDITIONS = {
        online: {
            name: l8n('autoActions.condition.online'),
            value: true
        },
        city: {
            name: l8n('autoActions.condition.city'),
            comparators: ['equal', 'not_equal'],
            value: DEFAULT_CITY
        },
        country: {
            name: l8n('autoActions.condition.country'),
            comparators: ['equal', 'not_equal'],
            value: DEFAULT_COUNTRY
        },
        hour: {
            name: l8n('autoActions.condition.hour'),
            comparators: ['equal', 'not_equal', 'greater', 'greater_equal', 'lower', 'lower_equal'],
            value: 12
        },
        week_day: {
            name: l8n('autoActions.condition.weekDay'),
            comparators: ['equal', 'not_equal', 'greater', 'greater_equal', 'lower', 'lower_equal'],
            value: 5
        },
        page_title: {
            name: l8n('autoActions.condition.pageTitle'),
            comparators: ['equal', 'not_equal', 'contain', 'not_contain'],
            value: ''
        },
        page_url: {
            name: l8n('autoActions.condition.pageUrl'),
            comparators: ['equal', 'not_equal', 'contain', 'not_contain'],
            value: ''
        },
        pages_count: {
            name: l8n('autoActions.condition.pagesCount'),
            comparators: ['equal', 'not_equal', 'greater', 'greater_equal', 'lower', 'lower_equal'],
            value: 1
        },
        time_on_page: {
            name: l8n('autoActions.condition.timeOnPage'),
            comparators: ['greater', 'lower'],
            value: 20
        },
        time_on_site: {
            name: l8n('autoActions.condition.timeOnSite'),
            comparators: ['greater', 'lower'],
            value: 0
        },
        time_after_close: {
            name: l8n('autoActions.condition.timeAfterClose'),
            comparators: ['greater', 'lower'],
            value: 300
        },
        time_after_first_message: {
            name: l8n('autoActions.condition.timeAfterFirstMessage'),
            comparators: ['greater', 'lower'],
            value: 60
        },
        time_after_invitation: {
            name: l8n('autoActions.condition.timeAfterInvitation'),
            comparators: ['greater', 'lower'],
            value: 60
        },
        number_of_visits: {
            name: l8n('autoActions.condition.numberOfVisits'),
            comparators: ['equal', 'not_equal', 'greater', 'greater_equal', 'lower', 'lower_equal'],
            value: 1
        },
        goal_scroll: {
            name: l8n('autoActions.condition.goalScroll'),
            comparators: ['equal', 'not_equal', 'greater', 'greater_equal', 'lower', 'lower_equal'],
            value: 100
        },
        goal_close: {
            name: l8n('autoActions.condition.goalClose'),
            value: true
        },
        ab_test_group: {
            name: l8n('autoActions.condition.abTestGroup'),
            value: 'group_a',
            group_name: 'asd'
        }
    };

    RULE_COMPARATORS = {
        equal: '=',
        not_equal: '&ne;',
        contain: l8n('autoActions.comparator.contain'),
        not_contain: l8n('autoActions.comparator.notContain'),
        greater: '>',
        greater_equal: '&ge;',
        lower: '<',
        lower_equal: '&le;',
        regexp: l8n('autoActions.comparator.regexp')
    }

    RULE_COMMANDS = {
        open_offline: {
            name: l8n('autoActions.command.openOffline'),
            params: {
                title: defaultTexts.offlineWidgetLabel,
                message: defaultTexts.offlineFormText
            }
        },
        proactive: {
            name: l8n('autoActions.command.proactive'),
            params: {
                message: defaultTexts.invitationText
            }
        },
        hide: {
            name: l8n('autoActions.command.hide')
        },
        system_message: {
            name: l8n('autoActions.command.systemMessage'),
            params: {
                message: defaultTexts.retainingMessage
            }
        },
        system_message_email: {
            name: l8n('autoActions.command.systemMessageEmail'),
            params: {
                message: defaultTexts.retainingMessageEmail
            }
        },
        show_callform: {
            name: l8n('autoActions.command.showCallform'),
            params: {
                title: defaultTexts.callformTitle,
                onceADay: true
            }
        }
    };

    if (hideCallRule) {
        delete RULE_COMMANDS.show_callform;
    }

    Rule = Backbone.NestedModel.extend({
        defaults: {
            name: l8n('autoActions.new'),
            enabled: true,
            type: 'all',
            conditions: [
                {
                    condition: 'online',
                    value: false
                }
            ],
            commands: [
                {
                    command: 'open_offline',
                    params: {
                        title: defaultTexts.offlineWidgetLabel,
                        message: defaultTexts.offlineFormText
                    }

                }
            ]
        },
        initialize: function () {
            if (!(this.get('conditions') instanceof Conditions)) {
                var conditions = new Conditions();
                conditions.add(this.get('conditions'));

                this.set({conditions: conditions});
            }

            if (!(this.get('commands') instanceof Commands)) {
                var commands = new Commands();
                commands.add(this.get('commands'));

                this.set({commands: commands});
            }
        },
        toJSON: function () {
            var json = Backbone.Model.prototype.toJSON.apply(this, arguments);
            json.conditions = this.get('conditions').toJSON();
            json.commands = this.get('commands').toJSON();
            return json;
        },
        backup: function () {
            this.savedData = this.toJSON();
        },
        valid: function () {
            var valid = true;
            if (this.view.expanded()) {
                _.each(this.get('conditions').models, function (condition) {
                    if (!condition.valid()) {
                        valid = false;
                    }
                });
                _.each(this.get('commands').models, function (command) {
                    if (!command.valid()) {
                        valid = false;
                    }
                });
            }

            return valid;
        }
    });

    BaseView = Backbone.View.extend({
        className: 'row',
        initialize: function () {
            this.model.view = this;
        },
        events: function () {
            return {
                'change .type': 'onTypeChange',
                'click .action-link': 'onRemove'
            }
        },
        template: function () {
            return $('#' + this.templateId).html();
        },
        render: function (index) {
            this.$el.html(this.html());

            this.$('select').selectDecor();

            return this;
        },
        onTypeChange: function (e) {
            var select = e.target;
            var type = select.options[select.selectedIndex].value;

            var collection = this.model.collection;
            var index = collection.indexOf(this.model);
            collection.remove(this.model);

            this.model = this.getNewModel(type);
            collection.add(this.model, {at: index});

        },
        onRemove: function (e) {
            this.model.collection.remove(this.model);
        },
        valid: function () {
            return true;
        }
    });

    ConditionView = BaseView.extend({
        html: function () {
            return _.template(this.template(), {condition: this.model});
        },
        getNewModel: function (type) {
            return new Condition({
                condition: type,
                comparator: RULE_CONDITIONS[type].comparators ? RULE_CONDITIONS[type].comparators[0] : null,
                value: RULE_CONDITIONS[type].value
            });
        }
    });

    ConditionSimpleView = ConditionView.extend({
        templateId: 'condition-simple-template'
    });

    ConditionBooleanView = ConditionView.extend({
        templateId: 'condition-boolean-template',
        events: function () {
            var events = ConditionView.prototype.events.apply(this, arguments);
            events['click label'] = 'onLabelClick';

            return events;
        },
        onLabelClick: function (e) {
            // run after checkbox state changed
            setTimeout(_.bind(function () {
                this.model.set({value: this.$('#radio-' + this.model.cid + '-true').prop('checked')});
            }, this), 0);
        }
    });

    ConditionWithComparator = ConditionView.extend({
        events: function () {
            var events = ConditionView.prototype.events.apply(this, arguments);
            events['change select.comparator'] = 'onComparatorChange';

            return events;
        },
        onComparatorChange: function (e) {
            var select = e.target;
            this.model.set({comparator: select.options[select.selectedIndex].value});
        }
    });

    ConditionTextView = ConditionWithComparator.extend({
        templateId: 'condition-text-template',
        render: function () {
            ConditionWithComparator.prototype.render.apply(this, arguments);
            setTimeout(_.bind(function () {
                this.$('input:text').focus();
            }, this), 0);

            return this;
        },
        events: function () {
            var events = ConditionWithComparator.prototype.events.apply(this, arguments);
            events['input'] = 'onInput';

            return events;
        },
        onInput: function (e) {
            var input = e.target;
            this.model.set({value: input.value});
        }
    });

    ConditionTextWithLabelView = ConditionTextView.extend({
        templateId: 'condition-text-with-label-template',
        html: function () {
            return _.template(this.template(), {condition: this.model, label: this.label});
        }
    });

    ConditionListView = ConditionWithComparator.extend({
        templateId: 'condition-list-template',
        events: function () {
            var events = ConditionWithComparator.prototype.events.apply(this, arguments);
            events['change select.condition-value'] = 'onSelectChange';

            return events;
        },
        html: function () {
            return _.template(this.template(), {condition: this.model, list: this.list});
        },
        onSelectChange: function (e) {
            var select = e.target;
            this.model.set({value: select.options[select.selectedIndex].value});
        }
    });

    ConditionOnlineView = ConditionBooleanView.extend({});

    ConditionTimeOnSiteView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.seconds')
    });

    ConditionTimeOnPageView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.seconds')
    });

    ConditionTimeAfterCloseView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.seconds')
    });

    ConditionTimeAfterFirstMessageView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.seconds')
    });

    ConditionTimeAfterInvitationView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.seconds')
    });

    ConditionNumberOfVisitsView = ConditionTextView.extend({});
    ConditionGoalScrollView = ConditionTextView.extend({});
    ConditionGoalCloseView = ConditionSimpleView.extend({});

    ConditionCityView = ConditionTextView.extend({
        templateId: 'condition-city-template',
        events: function () {
            var events = ConditionTextView.prototype.events.apply(this, arguments);
            events['input input:text'] = 'onCityInput';
            events['blur input:text'] = 'onCityBlur';

            return events;
        },
        render: function () {
            ConditionTextView.prototype.render.apply(this, arguments);
            this.$('.city').typeahead({
                hint: true,
                highlight: true,
                minLength: 3
            }, {
                name: 'cities',
                displayKey: 'value',
                source: cities.ttAdapter()
            }).on('typeahead:selected', _.bind(this.onCitySelected, this));
            return this;
        },
        onCitySelected: function (e, data) {
            this.model.set({value: data.value});
        },
        onCityInput: function (e) {
            var input = e.target;
            this.model.set({value: input.value});
            $(input).parent().parent().removeClass('error');
        },
        onCityBlur: function (e) {
            this.validate();
        },
        validate: function () {
            var input = this.$(".city.tt-input"),
                container = input.parent().parent();
            if ($.trim(input.val())) {
                container.removeClass('error');
                return true;
            } else {
                container.addClass('error');
                return false;
            }
        },
        valid: function () {
            return this.validate();
        }
    });

    ConditionCountryView = ConditionListView.extend({
        templateId: 'condition-country-template',
        list: RULES_COUNTRIES
    });

    ConditionHourView = ConditionTextWithLabelView.extend({
        label: l8n('autoActions.label.hour')
    });

    ConditionPageTitleView = ConditionTextView.extend({});

    ConditionPageUrlView = ConditionTextView.extend({});

    ConditionPagesCountView = ConditionTextWithLabelView.extend({
        templateId: 'condition-pages-count-template',
        label: ''
    });

    ConditionWeekDayView = ConditionListView.extend({
        list: {
            1: l8n('autoActions.weekDay.monday'),
            2: l8n('autoActions.weekDay.tuesday'),
            3: l8n('autoActions.weekDay.wednesday'),
            4: l8n('autoActions.weekDay.thursday'),
            5: l8n('autoActions.weekDay.friday'),
            6: l8n('autoActions.weekDay.saturday'),
            0: l8n('autoActions.weekDay.sunday')
        }
    });

    ConditionAbTestGroupView = ConditionListView.extend({
        templateId: 'condition-AbTestGroup-template',
        list: {
            group_a: l8n('autoActions.AbTestGroup.A'),
            group_b: l8n('autoActions.AbTestGroup.B')
        },
        events: function () {
            var events = ConditionTextView.prototype.events.apply(this, arguments);
            events['input input:text'] = 'onGroupNameChange';
            events['change select.condition-value'] = 'onSelectChange';

            return events;
        },
        onGroupNameChange: function (e) {
            var input = e.target;
            this.model.set({group_name: input.value});
            $(input).parent().parent().removeClass('error');
        },
        onSelectChange: function (e) {
            var select = e.target;
            this.model.set({value: select.options[select.selectedIndex].value});
        }
    });

    CommandView = BaseView.extend({
        templateId: 'command-simple-template',

        html: function () {
            return _.template(this.template(), {command: this.model});
        },
        getNewModel: function (type) {
            return new Command({
                command: type,
                params: _.clone(RULE_COMMANDS[type].params)
            });
        }
    });

    CommandHideView = CommandView.extend({});

    CommandWithMessageView = CommandView.extend({
        className: 'row zeromargin',
        templateId: 'command-message-template',
        events: function () {
            var events = CommandView.prototype.events.apply(this, arguments);
            events['input textarea'] = 'onMessageInput';
            events['blur textarea'] = 'onMessageBlur';

            return events;
        },
        render: function () {
            CommandView.prototype.render.apply(this, arguments);
            setTimeout(_.bind(function () {
                this.$('textarea').focus();
            }, this), 0);

            return this;
        },
        onMessageInput: function (e) {
            var textarea = e.target;
            // run after field value changed
            var params = this.model.get('params') || {};
            params.message = textarea.value;
            this.model.set({params: params});
            this.$("textarea").parent().removeClass('error');
        },
        onMessageBlur: function (e) {
            this.validate();
        },
        validate: function () {
            if ($.trim(this.$("textarea").val())) {
                this.$("textarea").parent().removeClass('error');
                return true;
            } else {
                this.$("textarea").parent().addClass('error');
                return false;
            }
        },
        valid: function () {
            return this.validate();
        }
    });

    CommandProactiveView = CommandWithMessageView.extend({
        templateId: 'command-proactive-template',
        events: function() {
            var events = CommandWithMessageView.prototype.events.apply(this, arguments);
            events['change select.department'] = 'onDepartmentChange';

            return events;
        },
        onDepartmentChange: function (e) {
            var select = e.target;
            var params = this.model.get('params') || {};
            params.department = select.options[select.selectedIndex].value;
            this.model.set({params: params});
        }
    });

    CommandSystemMessageView = CommandWithMessageView.extend({});
    CommandSystemMessageEmailView = CommandWithMessageView.extend({});

    CommandOpenOfflineView = CommandWithMessageView.extend({
        templateId: 'command-offline-template',
        events: function () {
            var events = CommandWithMessageView.prototype.events.apply(this, arguments);
            events['input input:text'] = 'onTitleInput';
            events['blur input:text'] = 'onTitleBlur';

            return events;
        },
        onTitleInput: function (e) {
            var input = e.target;
            // run after field value changed
            var params = this.model.get('params') || {};
            params.title = input.value;
            this.model.set({params: params});
            this.$("input:text").parent().removeClass('error');
        },
        onTitleBlur: function (e) {
            this.validate();
        },
        validate: function () {
            var messageValid = CommandWithMessageView.prototype.validate.apply(this, arguments);
            var titleValid;

            if ($.trim(this.$("input:text").val())) {
                this.$("input:text").parent().removeClass('error');
                titleValid = true;
            } else {
                this.$("input:text").parent().addClass('error');
                titleValid = false;
            }

            return messageValid && titleValid;
        }
    });

    CommandShowCallformView = CommandView.extend({
        templateId: 'command-callform-template',
        events: function() {
            var events = CommandView.prototype.events.apply(this, arguments);
            events['change input:checkbox'] = 'onChange';
            events['input input:text'] = 'onTitleInput';
            events['blur input:text'] = 'onTitleBlur';
            return events;
        },
        onChange: function(e) {
            var params = this.model.get('params') || {};
            params.onceADay = $(e.target).is(':checked');
            this.model.set({params: params});
        },
        onTitleInput: function (e) {
            var input = e.target;
            // run after field value changed
            var params = this.model.get('params') || {};
            params.title = input.value;
            this.model.set({params: params});
            this.$("input:text").parent().removeClass('error');
        },
        onTitleBlur: function (e) {
            this.validate();
        },
        validate: function () {
            if ($.trim(this.$("input:text").val())) {
                this.$("input:text").parent().removeClass('error');
                return true;
            } else {
                this.$("input:text").parent().addClass('error');
                return false;
            }
        },
        valid: function () {
            return this.validate();
        }
    });

    Conditions = Backbone.Collection.extend({
        model: Condition
    });

    Commands = Backbone.Collection.extend({
        model: Command
    });

    RuleFormView = Backbone.View.extend({
        className: 'row rule list-item',
        events: {
            'click #add-condition': 'onAddConditionClick',
            'click #save': 'save',
            'click #delete': 'delete',
            'click #cancel': 'cancel',
            'click .switcher': 'onSwitcherClick',
            'keydown #rule-title': 'onTitleKeyUp',
            'change #rule-type': 'onTypeChange',
            'change #rule-enabled': 'onEnabledChange'
        },
        render: function () {
            var template = _.template($('#action-form-template').html(), {rule: this.model});
            this.$el.html(template);

            this.$('select').selectDecor();

            this.$el.click(_.bind(this.expand, this));

            _.each(this.model.get('conditions').models, function (condition, index, models) {
                this.renderCondition(condition, index);
            }, this);

            _.each(this.model.get('commands').models, function (condition, index, models) {
                this.renderCommand(condition, index);
            }, this);

            return this;
        },
        initialize: function () {
            this.model.view = this;

            this.model.get('conditions').on('add', this.onConditionAdd, this);
            this.model.get('conditions').on('remove', this.onConditionRemove, this);
            this.model.get('commands').on('add', this.onCommandAdd, this);
            this.model.get('commands').on('remove', this.onCommandRemove, this);
        },
        renderCondition: function (condition, index) {
            var view = new window['Condition' + condition.getClassName() + 'View']({model: condition});
            var before = this.$('.conditions').children().get(index);
            if (before === undefined) {
                this.$('.conditions').append(view.render().el);
            } else {
                $(before).before(view.render().el);
            }
        },
        renderCommand: function (command, index) {
            var view = new window['Command' + command.getClassName() + 'View']({model: command});
            var before = this.$('.commands').children().get(index);
            if (before === undefined) {
                this.$('.commands').append(view.render().el);
            } else {
                $(before).before(view.render().el);
            }
        },
        expand: function (e) {
            if (!this.expanded()) {
                _.each(this.parent.views, function (view) {
                    view.cancel();
                });
                this.$el.addClass('expanded');

                if (this.model.savedData) {
                    this.$('#delete').show();
                } else {
                    this.$('#delete').hide();
                    this.$('.title>input').select();
                }

                if (e && e.preventDefault) {
                    e.preventDefault();
                }
            }
        },
        expanded: function () {
            return this.$el.hasClass('expanded');
        },
        collapse: function () {
            this.$el.removeClass('expanded');
        },
        save: function (e) {
            if (rules.save()) {
                this.collapse();
            }

            if (e && e.preventDefault) {
                e.preventDefault();
                e.stopPropagation();
            }
        },
        delete: function (e) {
            ruleToRemoveIndex = this.$el.index();

            deletePopup.open();

            if (e && e.preventDefault) {
                e.preventDefault();
                e.stopPropagation();
            }
        },
        cancel: function (e) {
            if (this.$el.hasClass('expanded')) {
                if (this.model.savedData) {
                    var rule = new Rule(this.model.savedData);
                    rule.backup();
                    this.model.collection.add(rule, {at: this.$el.index()});
                }

                this.model.collection.remove(this.model);
            }

            if (e && e.preventDefault) {
                e.preventDefault();
                e.stopPropagation();
            }
        },
        onConditionAdd: function (model, collection, options) {
            var index = (options.at !== undefined ? options.at : collection.length - 1);
            this.renderCondition(model, index);
        },
        onConditionRemove: function (model, collection, options) {
            this.$('.conditions').children().eq(options.index).remove();
        },
        onAddConditionClick: function (e) {
            this.model.get('conditions').add({
                condition: 'online',
                value: true
            });

            e.preventDefault();
        },
        onCommandAdd: function (model, collection, options) {
            var index = (options.at !== undefined ? options.at : collection.length - 1);
            this.renderCommand(model, index);
        },
        onCommandRemove: function (model, collection, options) {
            this.$('.commands').children().eq(options.index).remove();
        },
        onTitleKeyUp: function (e) {
            var input = e.target;
            setTimeout(_.bind(function () {
                this.model.set({name: input.value});
                this.$('.title>span').text(input.value);
            }, this));
        },
        onTypeChange: function (e) {
            var select = e.target;
            this.model.set({type: select.options[select.selectedIndex].value});
        },
        onEnabledChange: function (e) {
            this.model.set({enabled: e.target.checked});
            if (!this.$el.hasClass('expanded')) {
                rules.save(true);
            }
        },
        onSwitcherClick: function (e) {
            e.stopPropagation();
        }
    }, {
        ROW_HEIGHT_COLLAPSED: 66
    });

    updateJsonRulesPopup = function (){
        $('#json-code').text(JSON.stringify(rules.toJSON(), undefined, 2));
    }

    Rules = Backbone.Collection.extend({
        model: Rule,
        save: function (doNotShowMessage) {
            if (this.valid()) {
                var showMessage = !doNotShowMessage;
                $.ajax({
                    type: 'POST',
                    url: saveUrl,
                    data: {rules: JSON.stringify(this.toJSON()), csrf_key : csrfKey},
                    dataType: "json",
                    success: function (data) {
                        if (showMessage) {
                            $('#flash-messages')
                                .html('<div class="msg ' + data.type + '"><span>' + data.message + '</span><span class="close-button"></span></div>')
                                .show();

                            $('.msg .close-button').click(function (e) {
                                $(e.target).parent().slideUp('fast');
                            });

                            if (this.slideUpTimeout != null) {
                                clearTimeout(this.slideUpTimeout);
                            }
                            this.slideUpTimeout = setTimeout(function () {
                                $('#flash-messages').slideUp('fast');
                            }, 5000);
                        }
                        updateJsonRulesPopup();
                    }
                });
                this.backup();
                return true;
            } else {
                return false;
            }
        },
        valid: function () {
            var valid = true;
            _.each(this.models, function (rule) {
                if (!rule.valid()) {
                    valid = false;
                }

            });
            return valid;
        },
        backup: function () {
            _.each(this.models, function (rule) {
                rule.backup();

            });
        }
    });

    RuleListView = Backbone.View.extend({
        el: '#rules',
        views: [],
        events: {
            'change .enabeld-switcher': 'onSwitcherChange'
        },
        initialize: function () {
            this.collection.on('add', this.onRuleAdd, this);
            this.collection.on('remove', this.onRuleRemove, this);

            this.collection.backup();
        },
        onRuleAdd: function (model, collection, options) {
            var index = (options.at !== undefined ? options.at : collection.length - 1);
            this.renderRule(model, index);
        },
        onRuleRemove: function (model, collection, options) {
            this.views[options.index].remove();
            this.views.splice(options.index, 1);
        },
        renderRule: function (rule, index) {
            var view = new RuleFormView({model: rule});
            view.parent = this;
            var before = this.$el.children().get(index);
            if (before === undefined) {
                this.$el.append(view.render().el);
            } else {
                $(before).before(view.render().el);
            }
            this.views.splice(index, 0, view);
        },
        render: function () {
            _.each(this.collection.models, _.bind(this.renderRule, this));
        },
        onSwitcherChange: function (e) {
            var index = $(e.target).parents('.row.rule').index();
            var rule = rules.at(index);
            rule.set({enabled: e.target.checked});
            rules.save();
        }
    });

    cities = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '/widgets/cities?q=%QUERY'
    });
    cities.initialize();

    deletePopup = new Popup($($('#confirm-window-template').html()));

    $('#delete-confirm').click(_.bind(function () {
        if (ruleToRemoveIndex != null) {
            rules.remove(rules.at(ruleToRemoveIndex));
            rules.save();
        }
        deletePopup.close();
    }, this));
    $('#delete-cancel').click(_.bind(function () {
        ruleToRemoveIndex = null;
        deletePopup.close();
    }, this));
});
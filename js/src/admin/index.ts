import app from 'flarum/admin/app';
import ExtensionPage from 'flarum/admin/components/ExtensionPage';

app.initializers.add('piwind-username-blacklist', () => {
    app.extensionData
        .for('piwind-username-blacklist')
        .registerSetting({
            setting: 'piwind-username-blacklist.regex',
            label: app.translator.trans('piwind-username-blacklist.admin.settings.regex'),
            help: app.translator.trans('piwind-username-blacklist.admin.settings.regexHelp'),
            type: 'boolean',
        })
        .registerSetting({
            setting: 'piwind-username-blacklist.message',
            label: app.translator.trans('piwind-username-blacklist.admin.settings.message'),
            type: 'text',
        })
        .registerSetting(function (this: ExtensionPage) {
            return m('.Form-group', [
                m('label', app.translator.trans('piwind-username-blacklist.admin.settings.blacklist')),
                m('.helpText', app.translator.trans('piwind-username-blacklist.admin.settings.blacklistHelp')),
                m('textarea.FormControl', {
                    bidi: this.setting('piwind-username-blacklist.blacklist'),
                }),
            ]);
        })
        .registerSetting(function (this: ExtensionPage) {
            return m('.Form-group', [
                m('label', app.translator.trans('piwind-username-blacklist.admin.settings.whitelist')),
                m('.helpText', app.translator.trans('piwind-username-blacklist.admin.settings.whitelistHelp')),
                m('textarea.FormControl', {
                    bidi: this.setting('piwind-username-blacklist.whitelist'),
                }),
            ]);
        });
});

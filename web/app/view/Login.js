Ext.define('Pollenchecker.view.Login', {
	extend: 'Ext.form.Panel',
	xtype: 'login',
	requires: [
		'Ext.form.Panel',
		'Ext.field.Text',
		'Ext.field.Password',
		'Ext.field.Hidden',
		'Ext.TitleBar',
		'Ext.Button'
	],
	config: {
		fullscreen: true,
		items: [
			{
				xtype: 'textfield',
				name: '_username',
				label: 'Benutzername'
			}, 
			{
				xtype: 'passwordfield',
				name: '_password',
				label: 'Passwort'
			},
			{
				xtype: 'button',
				text: 'Anmeldung',
				id: 'btnLogin'
			},
			{
				xtype: 'hiddenfield',
				name: '_remember_me',
				value: 'on'
			},
			{
				xtype: 'titlebar',
				docked: 'top',
				title: 'Anmeldung'
			}
		],

	}
});
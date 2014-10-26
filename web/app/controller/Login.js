Ext.define('Pollenchecker.controller.Login', {
	extend: 'Ext.app.Controller',

	config: {
		refs: {
			loginButton: '#btnLogin',
			loginForm: 'login'
		},

		control: {
			loginButton: {
				tap: 'doTapLoginButton'
			}
		}
	},

	launch: function() {
		console.log('Launched');
	},

	doTapLoginButton: function() {
		var values = this.getLoginForm().getValues();
		Ext.apply(values, { _csrf_token: Pollenchecker.app.getToken('login') });

		Ext.Ajax.request({
			url: '/login_check',
			method: 'POST',
			params: values,
			success: function(response) {
				console.log(response);
			}
		});
	}
});
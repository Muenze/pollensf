Ext.define('Pollenchecker.controller.test', {
    extend: 'Ext.app.Controller',
    requires: [
        'Ext.Ajax'
    ],
    
    config: {
        refs: {
            
        },
        control: {
            
        }
    },
    
    //called when the Application is launched, remove if not needed
    launch: function(app) {
        Ext.Ajax.request({
            url: 'http://dev.pollenchecker.sf.localhost/pollen/get',
            // withCredentials: true,
            useDefaultXhrHeader: false,
            success: function() {
                
            },
            failure: function() {
            }
        });
    }
});

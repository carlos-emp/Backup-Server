/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var regidGlobal="esperando id de registro";
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var pushNotification = window.plugins.pushNotification;
pushNotification.register(app.successHandler, app.errorHandler,{"senderID":"411517468075","ecb":"app.onNotificationGCM"});
    },
    successHandler: function(result) {
        //alert('Todo Correcto! Resultado = '+result);
    },
    errorHandler:function(error) {
        alert(error);
    },
	onNotificationGCM: function(e) {
        switch( e.event ) {
            case 'registered':
                if ( e.regid.length > 0 ) {
                    //console.log("Id registro: " + e.regid);
                    //alert('Id registro:  '+e.regid);
                    regidGlobal=e.regid;
                    //ons.notification.alert({message: 'Id de registro: '+regidGlobal});
                     //document.getElementById('regId').value = e.regid;
                }
            break;
            case 'message':
                //alert('Mensaje:  '+e.message+' Contenido: '+e.msgcnt);
                ons.notification.alert({message: ''+e.message, title:"App HelpDesk"});
            break;
            case 'error':
                alert('GCM error = '+e.msg);
            break;
            default:
                alert('Ocurri� un evento desconocido de GCM');
            break;
            }
        },
        
    onNotificationAPN: function(event) { 
        var pushNotification = window.plugins.pushNotification; 
        alert("Running in JS - onNotificationAPN - Received a notification! " + event.alert); 
         
        if (event.alert) { 
            navigator.notification.alert(event.alert); 
        } 
        if (event.badge) { 
            pushNotification.setApplicationIconBadgeNumber(this.successHandler, this.errorHandler, event.badge); 
        } 
        if (event.sound) { 
            var snd = new Media(event.sound); 
            snd.play(); 
        }
    }
};
app.initialize();